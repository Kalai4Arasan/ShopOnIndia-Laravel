@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  style="border-radius:10px;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);">
                <div class="card-header" style=" font-family: 'Oswald', sans-serif;box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);background-color:#BAF8FC;text-align:center;"><b><h3>{{ __('Login') }}</h3></b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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
                            <div class="col-md-6 offset-md-3 ">
                                    <button type="submit" class="form-control btn btn-primary">
                                            {{ __('Login') }}
                                    </button>                              
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 col-sm-8 offset-sm-4 ">
                                    <div class="form-check">
                                            <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
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
                </div>
            </div>
        </div>
    </div>
</div>
<script src="resources/js/my-login.js"></script>
@endsection
