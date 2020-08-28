<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="ShopOnIndia" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopOnIndia</title>

    <!-- Angular CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

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
          background: url(/Pictures/load.gif) center no-repeat #fff;
          opacity:0.8;
        }

    .small{
      width:200px;
      border: #fff;
      background: #fff;
    }
      
    /*
        Ribbon For Decoration.
    */
  
    .box {
   width:200px;height:200px;
   position:relative;
}
.ribbon {
   position: absolute;
   right: -5px; top: -5px;
   z-index: 1;
   overflow: hidden;
   width: 75px; height: 75px; 
   text-align: right;
}
.ribbon span {
   font-size: 10px;
   color: #fff; 
   text-transform: uppercase; 
   text-align: center;
   font-weight: bold; line-height: 20px;
   transform: rotate(45deg);
   width: 100px; display: block;
   background: #79A70A;
   background: linear-gradient(#9BC90D 0%, #79A70A 100%);
   box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
   position: absolute;
   top: 19px; right: -21px;
}
.ribbon span::before {
   content: '';
   position: absolute; 
   left: 0px; top: 100%;
   z-index: -1;
   border-left: 3px solid #79A70A;
   border-right: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #79A70A;
}
.ribbon span::after {
   content: '';
   position: absolute; 
   right: 0%; top: 100%;
   z-index: -1;
   border-right: 3px solid #79A70A;
   border-left: 3px solid transparent;
   border-bottom: 3px solid transparent;
   border-top: 3px solid #79A70A;
}
.red span {background: linear-gradient(#F70505 0%, #8F0808 100%);}
.red span::before {border-left-color: #8F0808; border-top-color: #8F0808;}
.red span::after {border-right-color: #8F0808; border-top-color: #8F0808;}

        
    </style>

</head>

<body style="font-family: 'Source Sans Pro', sans-serif;">
  
  <!--Important for Sweet alert-->
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div id="spinner">
        <!--<img src="/Pictures/load.gif" alt="Loading..." srcset="">-->
        </div>
        <nav class=" navbar navbar-expand-md sticky-top  navbar-light bg-dark">
            <div class="container-fluid">
                    <a class="navbar-brand text-white" href="/"><img src="/Pictures/png1.png" alt="Bootstrappin'"
                        width="60">ShopOnIndia</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                          <ul class="navbar-nav mr-auto mt-2 mt-lg-0" >
                            <li class="nav-item">
                              <a class="nav-link text-white" href="/"> Home <span class="sr-only">ShopOnIndia</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-white" href="/product/deals"> Today's Deals </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-white" href="/Products/bought"> Orders </a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop by Category</a>
                              <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="/products/gadget/smartphones">Mobiles,Computers</a>
                                <a class="dropdown-item" id="cloths2" href="/products/cloths/kids">kid's Fashion</a>
                                <a class="dropdown-item" id="cloths" href="/products/cloths/women">Women's Fashion</a>
                                <a class="dropdown-item" href="/products/cloths/men">Men's Fashion</a>
                                <a class="dropdown-item" href="/">GiftCards</a>
                              </div>
                            </li>
                          </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mt-2">
                      <li class="nav-item mr-2" style="margin-top:6px;width:12%;">
                        <a class="btn btn-outline-success btn-sm btn-block mb-2" style=" border-radius:4px;" href="/cart/show"><i style="color:blue;" class="fas fa-shopping-cart p-1"></i>
        
                          <span  ng-controller="cont" id="cartcount" style="border-radius:6px;" class="badge badge-light">{{$c}}</span>
                          
                      </a>
                    </li>
                    <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="text"
                                placeholder="Search Products" required> <span class="input-group-btn">
                                <button type="submit" class="btn btn-success ml">
                                  <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white " href="{{ route('login') }}">
                                  <button class="btn btn-outline-primary btn-sm btn-block">
                                    {{ __(' Log In') }}
                                  </button>
                                  </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">
                                        <button class="btn btn-outline-primary btn-sm btn-block">
                                      {{ __('SignUp') }}
                                        </button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        <div class="container-fluid bg-secondary rounded-top">
            <div class="row">
                <div class="col-md-12">
                    <a class="text-dark"><h3 class=" text-center pt-1" onclick="BacktoTop()">Back to Top</h3></a>
                </div>
            </div>
        </div>
          <div class="container-fluid text-white bg-dark">
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
                          <a href="/seller" class="text-white">
                          Sell on ShopOnIndia
                          </a>
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
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col-md-12">
                      <div class="sharethis-inline-share-buttons mb-2"></div>
                        <p class="text-secondary text-center">© 2000-2019, ShopOnIndia.com, Inc. or its affiliates</p>
                    </div>
                </div>
            </div>
          </div> 
        </footer>
    </div>
</div>
</body>
<script>
var app=angular.module('ShopOnIndia',[]);
         app.controller('cont',function($scope,$http){
                  $scope.insert=function(id){
                    $http.get("http://127.0.0.1:8000/cart/add/"+id).success(function(){
                        display();
                    }).catch(function(){
                      login();
                    });
                  };
                  function display(){
                    $http.get("http://127.0.0.1:8000/cart/count").success(function(c){
                      document.querySelector("#cartcount").innerText=c;
                    }); 
                  }
                  function login(){
                    location.href="http://127.0.0.1:8000/login";
                  }
         });
function load(x){
	document.getElementById(x).innerHTML='<i class="fa fa-spinner fa-spin"></i>';
	setTimeout(function(){ document.getElementById(x).innerHTML='<i class="fas fa-cart-plus "></i>';	 }, 1500);	
}
</script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e0578b2e13da80012ea3381&product=inline-share-buttons&cms=sop' async='async'></script>
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
