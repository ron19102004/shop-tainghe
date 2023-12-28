<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'colorsProduct.color', 'imagesProduct'])->get();
        return $products;
    }
    public function details($id)
    {
        $product = Product::with(['category', 'colorsProduct.color', 'imagesProduct'])
            ->where('id', '=', $id)
            ->first();
        $products_new = Product::with(['category', 'colorsProduct.color', 'imagesProduct'])
            ->where('id', '!=', $id)
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        return view('product.details', [
            "product" => $product,
            "products_new" => $products_new
        ]);
    }
    public function indexAdmin()
    {
        $products = Product::with(['category', 'colorsProduct.color', 'imagesProduct'])->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $colors = Color::all();
        return view('admin.product.index', [
            "products" => $products,
            "categories" => $categories,
            "colors" => $colors
        ]);
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'description' => 'string',
            'price' => 'numeric|required',
            'amount_available' => 'numeric|required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->amount_available = $request->amount_available;
        $product->save();
        return redirect('/admin/products');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'numeric|required',
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'description' => 'string',
            'price' => 'numeric|required',
            'amount_available' => 'numeric|required',
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->amount_available = $request->amount_available;
        $product->save();
        return redirect('/admin/products');
    }
}
