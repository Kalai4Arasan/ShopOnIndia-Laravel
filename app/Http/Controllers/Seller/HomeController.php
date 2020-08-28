<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/seller/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('seller.auth:seller');
    }

    /**
     * Show the Seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect('/seller/home');
    }

}