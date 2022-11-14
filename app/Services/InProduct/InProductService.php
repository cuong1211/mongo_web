<?php

namespace App\Services\InProduct;

use App\Http\Requests\InProductRequest;
use App\Models\in_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class InProductService
{
    public function index()
    {
        $oder = in_product::query()->with('company','product')->get();
        return $oder;
    }
    public function create($data)
    {
        dd($data);
        if($data->hasFile('image')){
            $file = $data->file('image');
            $name = $file->getClientOriginalName();
            Image::make($file)->resize(300,500)->save(public_path('backend/uploads/cake/'.$name)); 
        }
        $create = in_product::create($data);
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
