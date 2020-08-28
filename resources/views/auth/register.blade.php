@extends('layouts.simplelayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><span class="badge badge-primary"><i class="fas fa-user-plus"></i></span>
            <div class="card "  style="box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);">
                <div class="card-header bg-secondary" style=" font-family: 'Oswald', sans-serif;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);text-align:center;"><b>
                    <a class="navbar-brand text-white" href="/"><img src="/Pictures/png1.png" alt="Bootstrappin'"
                            width="60">ShopIndia</a></b>
                            <div class="mt-2 btn-group" style="float:right" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item text-primary" href="/login">Login</a>
                                            <a class="dropdown-item text-primary" href="/register">SignUp</a>
                                    </div>
                                </div>
                        </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                                <div class="col-md-6 " style="position: relative;margin: 0 auto ;">  
                                <input id="name" placeholder="Ente Your Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                                <div class="col-md-6 " style="position: relative;margin: 0 auto ;">  
                              <input id="email" placeholder="E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6" style="position: relative;margin: 0 auto ;text-align: center;">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required >                                 @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-6" style="position: relative;margin: 0 auto ;text-align: center;">
                             <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SignUp') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>     
                    <a href="/" style="margin-left:48%;">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
