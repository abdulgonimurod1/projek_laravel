<?php

namespace App\Http\Controllers;

use App\Order_Detail;
use App\Order;
use App\Product;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_detail = Order_Detail::with([
            'order', 'product'
        ])->get();
        return view('admin.order_detail.index', compact('order_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function show(order_detail $order_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(order_detail $order_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(order_detail $order_detail)
    {
        //
    }
}
