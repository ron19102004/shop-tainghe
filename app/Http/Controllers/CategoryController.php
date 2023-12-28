<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:5048'
        ]);
        $generatedImageName = 'category' . time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images/uploads'), $generatedImageName);
        $category = new Category();
        $category->name = $request->name;
        $category->image = "images/uploads/$generatedImageName";
        $category->save();
        return redirect('/admin/products');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:5048'
        ]);
        $category = Category::find($request->id);
        if (isset($request->image)) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $generatedImageName = 'category' . time() . '-' . $request->name . '.' . $request->image->extension();
                $request->image->move(public_path('images/uploads'), $generatedImageName);
                $this->deleteImage($category->image);
                $category->image = "images/uploads/$generatedImageName";
            }
        }
        $category->name = $request->name;
        $category->save();
        return redirect('/admin/products');
    }

    private function deleteImage($imageName)
    {
        $imagePath = public_path($imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
    public function delete(Request $request)
    {
        $request->validate([
            'category_id' => 'numeric'
        ]);
        $categoryId = $request->category_id;
        $category = Category::find($categoryId);
        if ($category) {
            $category->delete();
        }
        return redirect('/admin/products');
    }
}
