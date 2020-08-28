<?php

namespace App\Http\Controllers;

use App\Cart;
use App\products;
use Alert;
use View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('verified');
    }
    public function index()
    {
        $user=auth()->user()->id;
        $prod=collect([]);
        $cart=DB::select("SELECT prod_id FROM cart where user_id=$user");
        foreach ($cart as $c){
        $p=products::where('prod_id',$c->prod_id)->get();
        $prod->push($p);
        }
        if(count($prod)>0){
        return view('Products.cartprod')->with('prod',$prod);
        }
        else{
            Alert::toast('No products in your cart')->autoClose(5000)->position('top-left');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=auth()->user()->id;
        $check=Cart::where('user_id',$user)->where('prod_id',$id)->get();
        if(count($check)==0)
        {
            $post=new Cart();
            $post->user_id=$user;
            $post->prod_id=$id;
            $post->save(); 
        }
    }
    public function count(){
        $ch=Cart::where('user_id',auth()->user()->id)->get();
        $c=count($ch);
        return $c;
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
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid)
    {
        $prod=Cart::where('user_id',auth()->user()->id)->where('prod_id',$pid);
        $prod->delete();
        $tot=Cart::where('user_id',auth()->user()->id)->get();
        if(count($tot)>0){
        return redirect()->back();
        }
        else{
            return redirect('/');
        }
    }
}
