<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SellerShopOnIndia</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--Loader JavaScript-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

     <!-- Place your kit's code here -->
     <script src="https://kit.fontawesome.com/a1d066e675.js"></script>
     
    <!-- fonts awesome-->
    <link href=“https://maxcdn.bootstrapcdn.com/font-awesome/5.7.0/css/font-awesome.min.css” rel="stylesheet"/>

    <style>
      .no-js #loader { display: none;  }
      .js #loader { display: block; position: absolute; left:100px; top: 0; }
        #spinner {
          position: fixed;
          z-index: 9999;
          left: 0px;
	        top: 0px;
          width: 100%;
	        height: 100%;
          background: url(/Pictures/load2.gif) center no-repeat #fff;
          opacity:0.8;
        }
    a:hover{
      border-radius: 6px;
      background-color:ivory;
    }
      
        
    </style>

</head>
<body style="font-family: 'Source Sans Pro', sans-serif;" class="">
  <!--Important for Sweet alert-->
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
  <div id="spinner">
    </div>
        <nav class=" navbar navbar-expand-md sticky-top navbar-light" style="background-color:burlywood">
            <div class="container-fluid">
                    <span class="navbar-brand" href="/seller"><img src="/Pictures/png1.png" alt="Bootstrappin'"
                        width="60">SellerShopOnIndia </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                            aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                              <a class="nav-link " href="/seller/"> Home <span class="sr-only">SellerShoponIndia</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " href="/seller/offer"> Give Offer </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " href="/seller/orders"> Orders </a>
                            </li>
                          </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <form action="/seller/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="text"
                                placeholder="Search Products"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-success">
                                  <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (Auth::guard('seller')->guest())
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('seller.login') }}">
                                <button class="btn btn-outline-dark btn-sm btn-block">
                                {{ __('Login') }}
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('seller.register') }}">
                                <button class="btn btn-outline-dark btn-sm btn-block">
                                {{ __('SignUp') }}
                                </button>
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('seller')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('seller.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item text-none" href="/seller/create">PostProducts</a>
                                <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer>
          <div class="container-fluid " style="background-color:burlywood">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4 pt-4 text-center ">
                      <h3>
                          Get to Know Us
                      </h3>
                      <ul class="list-unstyled">
                        <li class="list-item">
                            About Us
                        </li>
                        <li class="list-item">
                            Careers
                        </li>
                        <li class="list-item">
                         Press Releases
                        </li>
                        <li class="list-item">
                          ShopOnIndia Cares
                        </li>
                        <li class="list-item">
                          Gift a Smile
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4 pt-4 text-center">
                      <h3>
                        Connect with Us
                      </h3>
                      <ul class="list-unstyled">
                        <li class="list-item">
                          facebook
                        </li>
                        <li class="list-item">
                          Twitter
                        </li>
                        <li class="list-item">
                          Instagram
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4 pt-4 text-center">
                      <h3>
                       Make Money with Us
                      </h3>
                      <ul class="list-unstyled">
                        <li class="list-item">
                          Sell on ShopOnIndia
                        </li>
                        <li class="list-item">
                          Become an Affiliate
                        </li>
                        <li class="list-item">
                         Fulfilment by ShopOnIndia
                        </li>
                        <li class="list-item">
                          Advertise Your Products
                        </li>
                        <li class="list-item">
                          ShopOnIndia Pay on Merchants
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/"><p class="text-secondary text-center">© 2000-2019, ShopOnIndia.com, Inc. or its affiliates</p></a>
                    </div>
                </div>
            </div>
          </div> 
        </footer>
    </div>

</div>


</body>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
<script>



          $(window).load(function() {
             //$("#spinner").fadeOut("fast");
             $("#spinner").fadeOut('slow');
          });


        function BacktoTop() {
           document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
         }
         function Toggle() { 
            var temp = document.getElementById("password"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        }
  </script>
</html>

