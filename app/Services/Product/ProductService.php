<?php

namespace App\Services\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class ProductService
{
    public function index()
    {
        $index = Product::query()->with('category')->get();
        return $index;
    }
    public function create($data)
    {
        if (isset($data['img'])) {
            $file = $data['img'];
            $fileName = $file->getClientOriginalName();
            Image::make($file)->resize(261,261)->save(public_path('images/'.$fileName)); 
            $create = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'price' => $data['price'],
                'img' => $fileName,
                'description' => $data['description'],
            ]);
        }
        return $create;
    }
    public function edit(ProductRequest $request, $id)
    {

        $Product = Product::where('_id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);
        // $Product = Product::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $Product;
    }
    public function delete($id)
    {
        $delete = Product::where('_id', $id)
            ->delete();
        return $delete;
    }
}
