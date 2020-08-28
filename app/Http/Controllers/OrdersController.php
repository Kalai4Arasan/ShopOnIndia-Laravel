<?php

namespace App\Http\Controllers;

use App\orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }
   
   
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
    public function store(){
        //
    }

    public function storestatus($id,$status)
    {
        $post=orders::find($id);
        $post->status=$status;
        $post->save();
        return redirect('/seller/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = orders::findOrFail($id);
        $posts->delete();
        
        return redirect('/seller/orders');
    }
}
