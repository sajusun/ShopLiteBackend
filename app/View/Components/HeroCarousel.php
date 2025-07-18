<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroCarousel extends Component
{
    public $products;

    public function __construct()
    {
        $this->products = Product::orderBy('visits', 'desc')->take(10)->get();
    }
    public function render(): View|Closure|string
    {
        return view('components.hero-carousel');
    }
}
