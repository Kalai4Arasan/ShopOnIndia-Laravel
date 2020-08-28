@extends('layouts.simplelayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><span class="badge badge-primary"><i class="fas fa-user"></i></span>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6" style="position: relative;margin: 0 auto ;">
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
                                    <button type="submit" class="form-control btn btn-primary">
                                            {{ __('Login') }}
                                    </button>                              
                            </div>
                        </div>
                        <div class="col-md-2 offset-md-5 ">
                            <hr>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-2 offset-md-5 ">
                                        <a href="{{ route('register') }}" class="form-control btn btn-success">
                                                {{ __('SignUp') }}
                                        </a>                              
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="pl-5 col-md-12 offset-md-4 ">
                                    <div class="form-check">
                                            <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me ') }}
                                                </label>
                                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                            </div>
                            @if (Route::has('password.request'))
                                                <a style="display:inline-block;" class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                                </a>
                                            @endif
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
