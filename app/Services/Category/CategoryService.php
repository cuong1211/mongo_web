<?php

namespace App\Services\Category;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryService
{
    public function index()
    {
        $index = Category::query()->get();
        return $index;
    }
    public function create(CategoryRequest $request)
    {
        $create = Category::create($request->validated());
        return $create;
    }
    public function edit(CategoryRequest $request, $id)
    {

        // $a = 'ObjectId';
        // $Category_old = $a."("."'".$id."'".")";
        $Category = Category::where('_id', $id)
            ->update([
                'name' => $request->name,
            ]);
        // $Category = Category::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $Category;
    }
    public function delete($id)
    {
        $delete = Category::where('_id', $id)
            ->delete();
        return $delete;
    }
}
