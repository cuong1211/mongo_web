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
        $oder = Order::query()->with('product')->get();
        return $oder;
    }
    public function create($data)
    {
        $create = Order::create($data);
        return $create;
    }
    public function edit($data, $id)
    {
        // dd($data);
        if(isset($data['email'])){
            $email = $data['email'];
        }
        else{
            $email = '';
        }
        $order = Order::where('_id', $id);
        $order->update([
                'name' => $data['name'],
                'email' => $email,
                'address' => $data['address'],
                'phone' => $data['phone'],
                'product_id' => $data['product_id'],
                'total' => $data['total'],
                'date' => $data['date'],
                'status' => $data['status'],
            ]);
        return $order;
    }
    public function delete($id)
    {
        $delete = Order::where('_id', $id)
            ->delete();
        return $delete;
    }
}
