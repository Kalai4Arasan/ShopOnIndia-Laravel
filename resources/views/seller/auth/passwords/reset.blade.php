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
        <div class="col-md-8">
            <div class="card ">
                    <div class="card-header" style=" font-family: 'Oswald', sans-serif;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);background-color:burlywood;text-align:center;"><b>
                            {{ __('Reset Password') }}</div>

                <div class="card-body shadow-lg p-3 bg-white">
                    <form method="POST" action="{{ route('seller.password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password ') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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


