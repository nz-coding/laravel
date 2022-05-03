<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImages;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;
    public $title, $images = [];
    public $product_id;

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();
        
        $this->product_id = $product->id;
        $this->title = $product->title;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'title' => 'required',
        ]);

        $product = Product::where('id', $this->product_id)->first();
        $product->title = $this->title;
        $product->save();

        if($this->images != ''){
            foreach ($this->images as $key => $image) {
                $pimage = new ProductImages();
                $pimage->product_id = $product->id;
    
                $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
                $this->images[$key]->storeAs('all', $imageName);
    
                $pimage->image = $imageName;
                $pimage->save();
            }
        }

        $this->images = '';
        
        session()->flash('message', 'Product updated successfully');
    }


    public function deleteImage($id)
    {
        $image = ProductImages::where('id', $id)->first();
        $image->delete();

        session()->flash('message', 'Product image deleted successfully');
    }

    public function render()
    {
        $productImages = ProductImages::where('product_id', $this->product_id)->get();
        return view('livewire.product.edit-product-component', ['productImages'=>$productImages])->layout('livewire.layouts.base');
    }
}
