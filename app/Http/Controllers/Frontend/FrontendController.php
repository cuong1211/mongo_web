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

        $product = Product::query()->get();
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
