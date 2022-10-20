<?php 
namespace App\Services\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function index(){
        $oder = Order::query()->get();
        return $oder;
    }
    public function create(OrderRequest $request)
    {
        $create = Order::create($request->validated());
        return $create; 
        
    }
    public function edit(Request $request, $id){
        $order = DB::collection('orders')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ],['upsert' => true]);
        // $order = Order::find($obId)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'price' => $request->price,
        // ]);
        return $order;
    }
    public function delete($id){
        $delete = Order::find($id)->delete();
        return $delete;
    }
}
