<?php

namespace App\Http\Controllers;

use App\seller;
use App\products;
use Auth;
use Alert;
use App\buy;
use App\orders;

use Illuminate\Http\Request;

class SellerController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $seller=Auth::guard('seller')->user()->seller_id;
        $post=orders::where('seller_id',$seller)->get();
        return view('/seller/sellerOrders')->with('post',$post);
    }
    public function showprod()
    {
        $seller=Auth::guard('seller')->user()->seller_id;
        $post=products::where('seller_id',$seller)->get();
        if(count($post)==0){
            Alert::toast('Welcome... Add your products from today onwards.')->position('top-left')->autoClose(5000);
            return redirect('/seller/create');
        }
        return view('/seller/home')->with('post',$post);
    }
    public function offershow()
    {
        $seller=Auth::guard('seller')->user()->seller_id;
        $post=products::where('seller_id',$seller)->get();
        return view('/seller/giveoffer')->with('post',$post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=products::find($id);
        $post->offerprice=0;
        $post->save();
        return redirect('/seller/offer');
    }
}
