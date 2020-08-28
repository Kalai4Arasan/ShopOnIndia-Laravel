<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\buy;
use App\products;
use App\User;
use App\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class buyform extends Controller
{   
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Pages/buyform');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Pages/buyform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store1($prod_id)
     {
        $posts=products::find($prod_id);
        return view('Pages.buyform')->with('posts',$posts);
     }
     public function cartBuyForm($prod_id)
     {
        $posts=products::find($prod_id);
        return view('Pages.cartBuyForm')->with('posts',$posts);
     }

     public function cartBuy(Request $request)
    {
        
        $this->validate($request,[
            'street'=>'required|',
            'city'=>'required|',
            'state'=>'required|',
            'quantity'=>'required|integer|min:1|max:100'
        ]);
        $posts=new buy();
        $posts->prod_price=$request->input('quantity')*$request->input('prodprice');
        $posts->prod_name=$request->input('prodname');
        $posts->prod_id=$request->input('prodid');
        $posts->user_id=auth()->user()->id;
        $posts->username=$request->input('username');
        $posts->street=$request->input('street');
        $posts->city=$request->input('city');
        $posts->category=$request->input('prodcategory');
        $posts->state=$request->input('state');
        $posts->quantity=$request->input('quantity');
        $posts->seller_id=$request->input('seller_id');
        $posts->image=$request->input('image');
        $posts->securekey=Str::random(30);
        $posts->save();
        //delete from cart
        $prod=Cart::where('user_id',auth()->user()->id)->where('prod_id',$posts->prod_id);
        $prod->delete();
        $tot=Cart::where('user_id',auth()->user()->id)->get();
        if(count($tot)>0){
            Alert::success('Order Placed Successfully')->autoClose(5000);
            return redirect('/cart/show');
        }
        else{
            Alert::toast('Order Placed Successfully... Cart is empty now')->autoClose(5000);
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'street'=>'required|',
            'city'=>'required|',
            'state'=>'required|',
            'quantity'=>'required|integer|min:1|max:100'
        ]);
        $posts=new buy();
        $posts->prod_price=$request->input('quantity')*$request->input('prodprice');
        $posts->prod_name=$request->input('prodname');
        $posts->prod_id=$request->input('prodid');
        $posts->user_id=auth()->user()->id;
        $posts->username=$request->input('username');
        $posts->street=$request->input('street');
        $posts->city=$request->input('city');
        $posts->category=$request->input('prodcategory');
        $posts->state=$request->input('state');
        $posts->quantity=$request->input('quantity');
        $posts->seller_id=$request->input('seller_id');
        $posts->image=$request->input('image');
        $posts->securekey=Str::random(30);
        $posts->save();
        Alert::success('Order Placed Successfully')->autoClose(5000);
        return redirect('Products/bought');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {      
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('Pages/orderplaced')->with('buys',$user->buys);
    }

    public function dow($id){
        $buys=buy::where('id',$id)->get();
        return view('Pages/Pdfdown')->with('buys',$buys);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buys=buy::find($id);
        return view('Pages/edit')->with('buys',$buys);
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
        $posts=buy::find($id);
        $prods=products::find($posts->prod_id);
        $posts->user_id=auth()->user()->id;
        $posts->prod_price=$request->input('quantity')*$prods->price;
        $posts->prod_name=$request->input('prodname');
        $posts->user_id=auth()->user()->id;
        $posts->username=$request->input('username');
        $posts->street=$request->input('street');
        $posts->city=$request->input('city');
        $posts->state=$request->input('state');
        $posts->quantity=$request->input('quantity');
        $posts->save();
        Alert::success('Updated Successfully')->autoClose(5000);
        return redirect('/Products/bought');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = buy::findOrFail($id);
        $posts->delete();
        return redirect('/Products/bought');
    }
}
