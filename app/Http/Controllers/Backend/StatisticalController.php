<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\in_product;
use App\Models\Order;
use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Enums\StatusType;


class StatisticalController extends Controller
{
    public function Product()
    {
        $product = Product::all();
        $status  = StatusType::Accept;
        $sale = Order::query()->where('product_id', '63640a51efd66efb60015bb5')->get()->where('status', $status)->sum('status');
        // dd($sale);
        return view('pages.statistic.product',compact('product','sale'));
    }
    public function SaleReport(Request $request)
    {   
        // dd($request);
        // dd($request->start_date);
        $order = Order::query()->with('product')->where('status', '1')->get()->whereBetween('date', [$request->start_date, $request->end_date]);
        // dd($order);
        return view('pages.statistic.report',compact('order'));
    }
}
