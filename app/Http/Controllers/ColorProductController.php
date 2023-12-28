<?php

namespace App\Http\Controllers;

use App\Models\ColorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ColorProductController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            "product_id" => 'required|numeric',
            "color_id" => 'required|numeric',
        ]);
        $products = DB::table('color_products')
            ->where('product_id', '=', $request->product_id)
            ->where('color_id', '=', $request->color_id)
            ->first();
        if($products != null){
            throw ValidationException::withMessages(['notify' => 'Liên kết đã tồn tại']);
        }
        $newModel = new ColorProduct();
        $newModel->color_id = $request->color_id;
        $newModel->product_id = $request->product_id;
        $newModel->save();
        return redirect('/admin/products');
    }
    public function delete(Request $request){
        $request->validate([
            "color_product_id" => 'required|numeric',
        ]);
        $color_product = ColorProduct::find($request->color_product_id);
        if($color_product == null){
            throw ValidationException::withMessages(['notify' => 'Liên kết không tồn tại']);
        }
        $color_product->delete();
        return redirect('/admin/products');
    }
}
