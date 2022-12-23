<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Order\OrderService;
use App\Models\in_product;
use Spatie\Searchable\Search;

class FrontendController extends Controller
{
    protected $orderservice;
    public function __construct(OrderService $orderservice)
    {
        $this->orderservice = $orderservice;
    }
    public function index()
    {
       
        $product = Product::offset(0)->limit(3)->get();
        return view('pages.frontend.index', compact('product'));
    }
    public function getProduct(Request $request)
    {
        if ($request->has('query')) {
            $search = $request->input('query');
            $product_search = Product::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        }
        else{
            $product_search = null;
            $search = null;
        }
        $cate = Category::query()->get();
        $product = Product::query()->get();
        return view('pages.frontend.product', compact('product', 'cate', 'product_search', 'search'));
    }
    public function getDetail($id)
    {
        $product = Product::find($id);
        return view('pages.frontend.detail', compact('product'));
    }
    public function postOrder(OrderRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $this->orderservice->create($data);
        return redirect()->route('frontend.product')->with('message', 'Đặt hàng thành công');
    }
    // public function getSearch(Request $request)
    // {
    //     $search = $request->input('query');

    //     $product_search = Product::query()
    //         ->where('name', 'LIKE', "%{$search}%")
    //         ->get();
    //     return view('pages.frontend.product', compact('product_search'));
    // }
}
