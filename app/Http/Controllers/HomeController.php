<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('/');
    }
    public function show()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        if(count($user->buys)==0){
            Alert::toast('Till now you did not ordered any products. ')->autoClose(5000)->position('top-left');
            return redirect()->back();
        }
        return view('Products/bought')->with('buys',$user->buys);
    }

    public function edit(){
        return view('Pages/edit');
    }
}
