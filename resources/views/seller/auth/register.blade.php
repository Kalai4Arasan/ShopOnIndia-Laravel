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
        <div class="col-md-8"><span class="badge badge-primary"><i class="fas fa-user-plus"></i></span>
            <div class="card"  style="border-radius:10px;box-shadow: 0 1px 2px rgba(0, 0, 0, .2), inset 0 1px 0 rgba(255, 255, 255, .5);">
                <div class="card-header" style=" font-family: 'Oswald', sans-serif;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);background-color:burlywood;text-align:center;"><b>
                        <span class="navbar-brand" href="/seller"><img src="/Pictures/pngseller.png" alt="Bootstrappin'"
                            width="60">SellerShopOnIndia </span></b>
                            <div class="mt-3 btn-group" style="float:right" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item text-primary" href="/seller/login">Login</a>
                                            <a class="dropdown-item text-primary" href="/seller/register">SignUp</a>
                                    </div>
                                </div>
                        
                        </div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('seller.register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Shop Address') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="Address" class="form-control{{ $errors->has('Address') ? ' is-invalid' : '' }}" name="Address" value="{{ old('Address') }}" required></textarea>
    
                                    @if ($errors->has('Address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                    <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" required>
        
                                        @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style="margin-left:43%;border-radius:20px;" class="btn btn-primary">
                                    {{ __('SignUp') }}
                                </button>
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


