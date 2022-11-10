<?php

namespace App\Services\InProduct;

use App\Http\Requests\InProductRequest;
use App\Models\in_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InProductService
{
    public function index()
    {
        $oder = in_product::query()->get();
        return $oder;
    }
    public function create(InProductRequest $request)
    {
        $create = in_product::create($request->validated());
        return $create;
    }
    public function edit(InProductRequest $request, $id)
    {

        // $a = 'ObjectId';
        // $InProduct_old = $a."("."'".$id."'".")";
        $InProduct = in_product::where('_id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        // $InProduct = InProduct::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $InProduct;
    }
    public function delete($id)
    {
        $delete = in_product::where('_id', $id)
            ->delete();
        return $delete;
    }
}
