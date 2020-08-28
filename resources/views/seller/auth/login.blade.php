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
  <div id="spinner">
    </div>
    <main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><span class="badge badge-primary"><i class="fas fa-user"></i></span>
            <div class="card">
                <div class="card-header" style=" font-family: 'Oswald', sans-serif;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);background-color:burlywood;text-align:center;"><b>
                    <span class="navbar-brand" href="/seller"><img src="/Pictures/pngseller.png" alt="Bootstrappin'"
                        width="60">SellerShopOnIndia </span>

                        <div class="mt-3 btn-group" style="float:right" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item text-primary" href="/seller/login">Login</a>
                                    <a class="dropdown-item text-primary" href="/seller/register">SignUp</a>
                            </div>
                        </div>
            </b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('seller.login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 " style="position: relative;margin: 0 auto ;">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6" style="position: relative;margin: 0 auto ;text-align: center;">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required >
                                   <span style="padding-left:39%;position:absolute;top:12px;" class="fa fa-eye border-rounded" onclick="Toggle()"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 offset-md-5 ">
                                    <button type="submit" style="border-radius:20px;" class="form-control btn btn-primary">
                                            {{ __('Login') }}
                                    </button>                              
                            </div>
                        </div>

                        <div class="col-md-2 offset-md-5 ">
                            <hr>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-2 offset-md-5 ">
                                        <a href="{{ route('seller.register') }}" style="border-radius:20px;" class="form-control btn btn-success">
                                                {{ __('SignUp') }}
                                        </a>                              
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="pl-5 col-md-12 offset-md-4 ">
                                    <div class="form-check">
                                            <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>
                            @if (Route::has('password.request'))
                                                <a style="display:inline-block;" class="btn btn-link" href="{{ route('seller.password.request') }}">
                                                Forgot Your Password?
                                                </a>
                                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

</div>

</div>

</body>
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


