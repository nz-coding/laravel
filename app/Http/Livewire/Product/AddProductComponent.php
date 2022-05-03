<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImages;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $title, $images = [];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'images' => 'required',
        ]);
    }

    public function storeProduct()
    {
        $this->validate([
            'title' => 'required',
            'images' => 'required',
        ]);

        $product = new Product();
        $product->title = $this->title;
        $product->save();

        foreach ($this->images as $key => $image) {
            $pimage = new ProductImages();
            $pimage->product_id = $product->id;

            $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->image = $imageName;
            $pimage->save();
        }

        $this->title = '';
        $this->images = '';
        
        session()->flash('message', 'Product added successfully');
    }

    public function render()
    {
        return view('livewire.product.add-product-component')->layout('livewire.layouts.base');
    }
}
