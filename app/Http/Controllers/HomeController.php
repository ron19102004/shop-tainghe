<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'colorsProduct.color', 'imagesProduct'])
            ->orderBy('starRate', 'DESC')
            ->take(6)
            ->get();
        return view('app', [
            "products" => $products
        ]);
    }
}
