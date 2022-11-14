<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Order\OrderService;
use App\Models\in_product;

class FrontendController extends Controller
{
    protected $orderservice;
    public function __construct(OrderService $orderservice)
    {
        $this->orderservice = $orderservice;
    }
    public function getProduct()
    {

        $product = Product::query()->paginate(10);
        $nhap = in_product::query()->get();
        $count = Product::count();
        $tong_sp = 0;
        $tong_tien = 0; 
        foreach ($nhap as $key) {
            $tong_sp += $key->quantity;
            $tong_tien += $key->total;
        }
        dd($count, $tong_sp,$tong_tien, $nhap);
        return view('pages.frontend.product',compact('product'));
    }
    public function getDetail($id)
    {
        $product = Product::find($id);
        return view('pages.frontend.detail',compact('product'));
    }
    public function postOrder(OrderRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $this->orderservice->create($data);
        return redirect()->route('frontend.product')->with('message','Đặt hàng thành công');
    }
}
