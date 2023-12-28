<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class ImageProductController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric',
            'files.*' => 'required|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:5048', // Điều kiện kiểm tra cho từng tệp
        ]);
        $index = 0;
        foreach ($request->file('files') as $file) {
            $generatedImageName = 'productImage-'.$index. time() . '-' . $request->product_id . '.' . $file->extension();
            $file->move(public_path('images/uploads'), $generatedImageName);
            $newProductImg = new ImageProduct();
            $newProductImg->product_id = $request->product_id;
            $newProductImg->image = "images/uploads/$generatedImageName";
            $newProductImg->save();
            $index++;
        }
        return redirect('/admin/products');
    }
    public function delete(Request $request)
    {
        $request->validate([
            'image_product_id' => 'required|numeric',
        ]);
        $image_product = ImageProduct::find($request->image_product_id);
        if ($image_product == null) {
            throw ValidationException::withMessages(['notify' => 'Thông liên kết không tồn tại']);
        }
        $this->deleteImage($image_product->image);
        $image_product->delete();
        return redirect('/admin/products');
    }
    private function deleteImage($imageName)
    {
        $imagePath = public_path($imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
