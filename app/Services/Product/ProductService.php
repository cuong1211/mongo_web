<?php

namespace App\Services\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductService
{
    public function index()
    {
        $index = Product::query()->with('category')->get();
        return $index;
    }
    public function create(ProductRequest $request)
    {
        $create = Product::create($request->validated());
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
