<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {
        $products = Product::get();

        return view('livewire.product.product-component', ['products'=>$products])->layout('livewire.layouts.base');
    }
}
