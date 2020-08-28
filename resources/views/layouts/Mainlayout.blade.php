<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
    body {
    margin:0;
    padding:0;
    }	

    </style>
  </head>
  <body  style="font-family: 'Source Sans Pro', sans-serif;">
     <nav class=" navbar navbar-expand-md sticky-top navbar-light bg-dark">
        <a class="navbar-brand text-white" href="/"><img src="/Pictures/png1.png" alt="Bootstrappin'"
          width="60">ShopIndia</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="/"> Home <span class="sr-only">ShopIndia</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/deals"> Today's Deals </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop by Category</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="/mobcom">Mobiles,Computers</a>
                <a class="dropdown-item" href="/elect">TV,Appliances,Electronics</a>
                <a class="dropdown-item" href="/men">Men's Fashion</a>
                <a class="dropdown-item" href="/women">Women's Fashion</a>
                <a class="dropdown-item" href="/kids">Toys,BabyProducts,KidsFashion</a>
                <a class="dropdown-item" href="/gift">GiftCards</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="/search" method="POST">
            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
              @guest
              <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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
         </ul>
        </div>
      </nav>
    <br>
      <div style="font-family: 'Lato', sans-serif;">      
      <div class="container">
                  @include('messages/message')
                  <main>
                      @yield('content')
                  </main>
              </div>
            <hr>
            <footer>
            <div class="container-fluid bg-secondary rounded-top">
                <div class="row">
                    <div class="col-md-12">
                        <a class="text-dark" href=""><h3 class=" text-center" onclick="BacktoTop()">Back to Top</h3></a>
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
                              ShopiIndia Cares
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
                              Sell on ShopIndia
                            </li>
                            <li class="list-item">
                              Become an Affilite
                            </li>
                            <li class="list-item">
                             Fulfilment by ShopIndia
                            </li>
                            <li class="list-item">
                              Advertise Your Products
                            </li>
                            <li class="list-item">
                              ShopIndia Pay on Merchants
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
                            <p class="text-secondary text-center">© 2000-2019, ShopIndia.com, Inc. or its affiliates</p>
                        </div>
                    </div>
                </div>
              </div> 
            </footer>
   </body>
   <script>
   function BacktoTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
   </script>
 </html>

