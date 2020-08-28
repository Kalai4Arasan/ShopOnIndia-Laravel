<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\products;
use App\User;
use App\history;
use App\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Input;

/*important*/
View::composer('layouts.app', function ($view) {
    if(!Auth::guest()){
    $ch=Cart::where('user_id',Auth::user()->id)->get();
    $c=count($ch);
    }
    else{
        $c=0;
    }
    $view->with('c',$c);
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Products/bought', 'HomeController@show');
Route::get('/homepage','ProductsController@index');
Route::get('/homepage/user','ProductsController@index1');
Route::get('/',function(){
    if(Auth::guest()){
        Route::get('/homepage','ProductsController@index');
        return redirect('/homepage');
    }
    else{
        Route::get('/homepage/user','ProductsController@index1');
        return redirect('/homepage/user');
    }

});
Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('/buy/placed',function(){
    return view('Pages/orderplaced'); 
});
Route::resource('buy','buyform');
Route::get('/buys/{prod_id}','buyform@store1');
Route::get('/buys/cart/{prod_id}','buyform@cartBuyForm');
Route::post('/buys/cart/store/{prod_id}','buyform@cartBuy');
Route::get('/buy/popup','buyform@show');
Route::get('/buys/{id}/destroy','buyform@destroy');
Route::get('/file/download/{id}','buyform@dow');
Route::resource('products','ProductsController');
Route::resource('orders','OrdersController');



//for visting smartphones section:
    Route::get('/products/mobiles/{id}','ProductsController@show');
    Route::get('/products/gadget/smartphones',function(){
        if(!Auth::guest()){
        $post=new history();
        $post->user_id=auth()->user()->id;
        $post->category="smartphone";
        $post->save();
        return redirect('/products/mobiles/{id}');
        }
        else{
            return redirect('/products/mobiles/{id}');
        }
    });

//for visiting women cloths section:
Route::get('/products/cloths/womenwear/{id}','ProductsController@cloths');
Route::get('/products/cloths/women',function(){
    if(!Auth::guest()){
    $post=new history();
    $post->user_id=auth()->user()->id;
    $post->category="womenwear";
    $post->save();
    return redirect('/products/cloths/womenwear/{id}');
    }
    else{
        return redirect('/products/cloths/womenwear/{id}');
    }
});


Route::get('/products/cloths/kids/{id}','ProductsController@cloths2');
//for visiting kids section:
    Route::get('/products/cloths/kids',function(){
        if(!Auth::guest()){
        $post=new history();
        $post->user_id=auth()->user()->id;
        $post->category="kidswear";
        $post->save();
        return redirect('/products/cloths/kids/{id}');
        }
        else{
            return redirect('/products/cloths/kids/{id}');
        }
    });

Route::get('/products/cloths/menwear/{id}','ProductsController@cloths3');
//for visting men cloths:
    Route::get('/products/cloths/men',function(){
        if(!Auth::guest()){
        $post=new history();
        $post->user_id=auth()->user()->id;
        $post->category="menwear";
        $post->save();
        return redirect('/products/cloths/menwear/{id}');
        }
        else{
            return redirect('/products/cloths/menwear/{id}');
        }
    });

Route::get('/products/cloths/womenwear/show/{prod_id}','ProductsController@show1');
Route::get('/products/cloths/kidswear/show/{prod_id}','ProductsController@show1');
Route::get('/products/cloths/menwear/show/{prod_id}','ProductsController@show1');
Route::get('/products/smartphones/{prod_id}','ProductsController@show1');
Route::get('/products/show/{prod_id}','ProductsController@show1');
Route::get('/product/deals','ProductsController@deals');
Route::get('/products/{id}/destroy', 'ProductsController@destroy');
Route::get('/product/{id}/edit','ProductsController@edit');
Route::any('/search',function(){
    $text = Input::get('text');
    $prod = products::where('prod_name','LIKE','%'.$text.'%')->get();
    return view('/Products/search')->with('prod',$prod)->withQuery ( $text );
});


Route::get('/seller/status/{id}/{status}','OrdersController@storestatus');
Route::get('/seller/destroy/{id}','OrdersController@destroy');
Auth::routes();
Route::get('/seller/create','ProductsController@create');
Route::get('/seller/orders','SellerController@show');
Route::get('/seller/offer','SellerController@offershow');
Route::get('/seller/offer/remove/{id}','SellerController@destroy');
Route::get('/seller/home','SellerController@showprod');
Route::get('/seller/offer/change',function(){
    $price=Input::get('offprice');
    $id=Input::get('id');
    $post=products::find($id);
    if($price>0 && $price<$post->price){
    $post->offerprice=$price;
    $post->offerpercent=100-(($post->offerprice/$post->price)*100);
    $post->save();
    return redirect('/seller/offer');
    }
    else{
        return redirect('/seller/offer')->withErrors(['Enter the valid price', 'Enter the valid price']);;
    }
});
Route::any('/seller/search',function(){
    $text = Input::get('text');
    $prod = products::where('prod_name','LIKE','%'.$text.'%')->where('seller_id',Auth::guard('seller')->user()->seller_id)->get();
    return view('/seller/sellerSearch')->with('prod',$prod)->withQuery ( $text );
});


//cart
Route::get('/cart/add/{id}','CartController@create');
Route::get('/cart/del/{pid}','CartController@destroy');
Route::get('/cart/count','CartController@count');
Route::get('/cart/show','CartController@index');