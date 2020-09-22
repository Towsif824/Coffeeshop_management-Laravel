<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Takeaway;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //dd($request->all());
        $request->validate([
            'shipping_name'     =>'required',
            'shipping_address'  =>'required',
            'shipping_city'     =>'required',
            'shipping_phone'    =>'required',
            'shipping_notes'    =>'required'
        ]);

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_name = $request->input('shipping_name');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_notes = $request->input('shipping_notes');

        $order->grand_total=\Cart::getSubTotal();
        $order->item_count = \Cart::getContent()->count();

        $order->user = session()->get('username');
        $order->save();

        $take = new Takeaway();

        $take->order_number = uniqid('OrderNumber-');

        $take->shipping_name = $request->input('shipping_name');
        $take->shipping_address = $request->input('shipping_address');
        $take->shipping_city = $request->input('shipping_city');
        $take->shipping_phone = $request->input('shipping_phone');
        $take->shipping_notes = $request->input('shipping_notes');

        $take->grand_total=\Cart::getSubTotal();
        $take->item_count = \Cart::getContent()->count();

        $take->user = session()->get('username');
        $take->save();



        //dd('order created',$order);

        $cartItems = \Cart::getContent();

        foreach($cartItems as $item){
            $order->items()->attach($item->id,[
                'price'=>$item->price, 
                'quantity'=> $item->quantity
            ]);
        }

        



        \Cart::clear();

        return "order place, thank you for buying";



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
