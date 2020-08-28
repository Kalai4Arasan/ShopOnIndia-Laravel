<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\seller;
use App\Cart;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Image;

class ProductsController extends Controller 
{

    public function deals()
    {
        $prod=products::where('offerprice','>',0)->get();
         return view('/Products/todaydeals')->with('prod',$prod);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod=products::all()->take(-4);
        $nonpop=products::all();
        foreach($nonpop as $n){
            $id=products::find($n->prod_id);
            $id->popular=0;
            $id->save();
        }
        $topprod=DB::select("SELECT DISTINCT p.id,p.price,b.prod_id,b.prod_name,b.image,p.offerprice,p.offerpercent from buys as b,products as p where b.prod_name=p.prod_name order by prod_name DESC LIMIT 4");
        foreach ($topprod as $t){
            $id=products::find($t->prod_id);
            $id->popular=1;
            $id->save();
        }
        $offer=products::where("offerprice",'>',0)->get()->take(4);
        return view('welcome')->with(['prod'=>$prod,'topprod'=>$topprod,'offer'=>$offer]);
    }
    public function index1()
    {
        $user=auth()->user()->id;
        $categ=Category::where('user_id',$user)->get();
        $nonpop=products::all();
        foreach($nonpop as $n){
            $id=products::find($n->prod_id);
            $id->popular=0;
            $id->save();
        }
        $topprod=DB::select("SELECT DISTINCT p.id,p.price,b.prod_id,b.prod_name,b.image,p.offerprice,p.offerpercent,p.popular from buys as b,products as p where b.prod_name=p.prod_name order by prod_name DESC LIMIT 4");
        foreach ($topprod as $t){
            $id=products::find($t->prod_id);
            $id->popular=1;
            $id->save();
        }
        $topprod=DB::select("SELECT DISTINCT p.id,p.price,b.prod_id,b.prod_name,b.image,p.offerprice,p.offerpercent,p.popular from buys as b,products as p where b.prod_name=p.prod_name order by prod_name DESC LIMIT 4");
        $prod=products::where('category',$categ[0]->category)->get()->take(4);
        $offer=products::where("offerprice",'>',0)->get()->take(4);
        $offerall=products::where("offerprice",'>',0)->get();
       return view('welcome')->with(['prod'=>$prod,'topprod'=>$topprod,'offer'=>$offer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('/seller/postproducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'productName'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'productCategory'=>'required',
            'productPrice'=>'required|int',
            'productDescription'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            'productImage'=>'required|file|max:25000|mimes:jpeg,bmp,png',
        ]);

        $prod=new products();
        $prod->prod_id=hexdec(uniqid());;
        $prod->id=$prod->prod_id;
        $prod->category=$request->input('productCategory');
        $prod->prod_name=$request->input('productName');
        $prod->price=$request->input('productPrice');
        $prod->description=$request->input('productDescription');
        $prod->seller_id=Auth::guard('seller')->user()->seller_id;
        $prod->offerprice=0;
        $prod->offerpercent=0;


        //To store Product Images:
            if($request->hasFile('productImage')){
                $image=$request->file('productImage');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $location=public_path('/Pictures/'.$filename);
                Image::make($image)->save($location);
                $prod->image=$filename;
            }

        $prod->save();
        return redirect("/seller");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $data=products::where('category','smartphone')->get();
        if(count($data)==0){
            Alert::toast('No products in this category');
            return redirect()->back();
        }
        return view('/Products/smartphones')->with('data',$data);
    }
    public function cloths(){
        $data1=products::where('category','womenwear')->get();
        if(count($data1)==0){
            Alert::toast('No products in this category');
            return redirect()->back();
        }
        return view('/Products/cloths')->with('data1',$data1);
    }
    public function cloths2(){
        $data1=products::where('category','kidswear')->get();
        if(count($data1)==0){
            Alert::toast('No products in this category');
            return redirect()->back();
        }
        return view('/Products/cloths2')->with('data1',$data1);
    }
    public function cloths3(){
        $data1=products::where('category','menwear')->get();
        if(count($data1)==0){
            Alert::toast('No products in this category');
            return redirect()->back();
        }
        return view('/Products/cloths3')->with('data1',$data1);
    }

    public function show1($prod_id)
    {
        
       $data=products::where('prod_id',$prod_id)->get();
       if(count($data)==0){
        Alert::toast('No products in this category');
        return redirect()->back();
    }
       return view('/Products/showproduct')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod=products::find($id);
        return view('/seller/edit')->with('prod',$prod);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'productName'=>'required',
            'productCategory'=>'required',
            'productPrice'=>'required',
            'productDescription'=>'required',
            'productImage'=>'required'
        ]);

        $prod=products::find($id);
        $prod->category=$request->input('productCategory');
        $prod->prod_name=$request->input('productName');
        $prod->price=$request->input('productPrice');
        $prod->description=$request->input('productDescription');
        
        //To store Product Images:
            if($request->hasFile('productImage')){
                $image=$request->file('productImage');
                $filename=time() . '.' . $image->getClientOriginalExtension();
                $location=public_path('/Pictures/'.$filename);
                Image::make($image)->save($location);
                $prod->image=$filename;
            }

        $prod->save();
        return redirect("/seller");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = products::findOrFail($id);
        $posts->delete();
        return redirect('/seller');
    }
}
