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


class StatisticalController extends Controller
{
    public function Product()
    {
        $product = Product::all();
        return view('pages.statistic.product',compact('product'));
    }
    public function ProductList($id)
    {
        
    }
}
