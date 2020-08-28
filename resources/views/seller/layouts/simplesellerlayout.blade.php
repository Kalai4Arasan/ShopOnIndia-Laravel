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
            @yield('contents')
    </main>
    </body>

    <script>



    $(window).load(function() {
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