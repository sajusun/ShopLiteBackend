<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestProducts extends Component
{
  public $products;
    public function __construct()
    {
        $this->products = Product::with('category')->latest()->take(8)->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.latest-products');
    }
}
