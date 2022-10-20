<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Order\OrderService;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderservice;
    public function __construct(OrderService $orderservice)
    {
        $this->orderservice = $orderservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order = Order::all();
        // return $order;
        $order = $this->orderservice->index();
        // $order = (object)$order_array;
        // dd($order);
        return view('pages.order.main', compact('order'));
        // $order = Order::all();
        // return Datatables::of($order)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $this->orderservice->create($request);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'Thêm thành công'
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case 'get-list':
                $order = Order::all();
                return Datatables::of($order)->make(true);
                break;
            default:
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->orderservice->edit($request, $id);

        return response()->json(
            [
                'type' => 'success',
                'title' => 'Sửa thành công'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderservice->delete($id);
        return response()->json(
            [
                'type' => 'success',
                'title' => 'Xoá thành công'
            ],
            200
        );
    }
}
