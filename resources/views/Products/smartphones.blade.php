@extends('layouts.app')

@section('content')
    @foreach ($data as $item)
        <h1 class="text-uppercase">{{$item->category}}</h1>
        <hr>
        @break
    @endforeach
    <div class="container">
        <div class="card col-md-12">
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-md-3">
                        @if($item->offerprice>0 && $item->popular!=0) 
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
                        @elseif ($item->popular==1)
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
                        @elseif($item->offerprice!=0)
                        <div class="box">
                            <div class="ribbon red">
                                <span>{{$item->offerpercent}}% off</span>
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
                        <h2 class="lead" >&#x20B9;{{$item->offerprice}}</h2>

                        @else
                        <a href="/products/show/{{$item->prod_id}}">
                            <div class="small img-thumbnail">
                                <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
                                </div>
                        </a>
                        <h2 class="lead">
                            {{$item->prod_name}} 
                        </h2> 
                        <h2 class="lead" >&#x20B9;{{$item->price}}</h2>
                        @endif
                        <div  ng-controller="cont">
                            <a class="btn btn-info text-white mb-2" href="/buys/{{$item->prod_id}}">BUY</a>
                            <button id="idc{{$item->id}}  " class="btn btn-outline-warning mb-2" onclick="load(this.id)" ng-click="insert({{$item->prod_id}})" ><i class="fas fa-cart-plus "></i></button>
                            </div>
                    </div>				
                    @endforeach
</div>
</div>
</div><br>
@endsection