<?php

namespace App\Services\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function index()
    {
        $oder = Order::query()->get();
        return $oder;
    }
    public function create(OrderRequest $request)
    {
        $create = Order::create($request->validated());
        return $create;
    }
    public function edit(OrderRequest $request, $id)
    {

        // $a = 'ObjectId';
        // $order_old = $a."("."'".$id."'".")";
        $order = Order::where('_id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        // $order = Order::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $order;
    }
    public function delete($id)
    {
        $delete = Order::where('_id', $id)
            ->delete();
        return $delete;
    }
}
