@extends('layouts.app')

@section('content')
    <h3>Search Results</h3><hr>
@if (count($prod)>0)
    <div class="container">
        <div class="col-md-12">
                <div class="row">
                    @foreach ($prod as $item)
                    <div class="col-md-3">
                        @if ($item->offerprice==0)
                        <div class="box">
                            <div class="ribbon">
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        <a href="/products/show/{{$item->prod_id}}">
                            <div class="small img-thumbnail">
                                <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
                                </div>
                        </a>
                        <h2 class="lead">
                            {{$item->prod_name}} 
                        </h2> 
                        </div>
                        <h2 class="lead" >&#x20B9;{{$item->price}}</h2>
                        @else
                        <div class="box">
                            <div class="ribbon red">
                                <span><i class="fa fa-star mr-1"></i>{{$item->offerpercent}}% off</span>
                            </div>
                                <a href="/products/show/{{$item->prod_id}}">
                                    <div class="small img-thumbnail">
                                    <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
                                    </div>
                                <h2 class="lead">
                                {{$item->prod_name}} 
                            </h2>
                        </div>
                        
                        <h2 class="lead">&#x20B9;{{$item->offerprice}}</h2>
                       <!-- <h2 class="lead" ><strike>&#x20B9;{{$item->price}}</strike>  &nbsp; ({{$item->offerpercent}}% off)</h2>-->
                        @endif
                        <div  ng-controller="cont">
                            <a class="btn btn-info text-white mb-2" href="/buys/{{$item->prod_id}}">BUY</a>
                            <button class="btn btn-outline-warning mb-2" ng-click="insert({{$item->prod_id}})" ><i class="fas fa-cart-plus "></i></button>
                            </div>
                    </div>				
                    @endforeach
        </div>
        </div>
        </div><br>
            
        </div>
@else
<h3 class="text-center lead">No results Found.</h3>
@endif
@endsection