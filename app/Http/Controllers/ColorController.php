<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            "value" => 'required|string'
        ]);
        $color = Color::where('value', $request->value)->first();
        if ($color) {
            throw ValidationException::withMessages(['notify' => 'Giá trị màu đã tồn tại']);
        }
        $color_new = new Color();
        $color_new->name = $request->name;
        $color_new->value = $request->value;
        $color_new->save();
        return redirect('/admin/products');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            "name" => 'required|string',
            "value" => 'required|string'
        ]);
        $colorById = Color::find($request->id);
        $color = Color::where('value', $request->value)->first();
        if ($color != null && $colorById->value != $color->value) {
            throw ValidationException::withMessages(['notify' => 'Giá trị màu đã tồn tại']);
        }
        $colorById->name = $request->name;
        $colorById->value = $request->value;
        $colorById->save();
        return redirect('/admin/products');
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);
        $colorById = Color::find($request->id);
        $colorById->delete();
        return redirect('/admin/products');
    }
}
