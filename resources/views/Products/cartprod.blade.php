@extends('layouts.app')

@section('content')
        <h1 class="">Cart Products</h1>
    <div class="container">
        <div class="card col-md-12">
                <div class="row">
                    @foreach ($prod as $item)
                    <div class="col-md-3">
                        @if($item[0]->offerprice>0 && $item[0]->popular!=0) 
                        <div class="box">
                            <div class="ribbon red">
                                <span><i class="fa fa-star mr-1"></i>{{$item[0]->offerpercent}}% off</span>
                            </div>
                                <a href="/products/show/{{$item[0]->prod_id}}">
                                    <div class="small img-thumbnail">
                                    <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item[0]->image}}" /></a> 
                                    </div>
                                <h2 class="lead">
                                {{$item[0]->prod_name}} 
                            </h2>
                        </div> 
                        <h2 class="lead">&#x20B9;{{$item[0]->offerprice}}</h2>
                        @elseif ($item[0]->popular==1)
                        <div class="box">
                            <div class="ribbon">
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        <a href="/products/show/{{$item[0]->prod_id}}">
                            <div class="small img-thumbnail">
                                <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item[0]->image}}" /></a> 
                                </div>
                        </a>
                        <h2 class="lead">
                            {{$item[0]->prod_name}} 
                        </h2> 
                        </div>
                        <h2 class="lead" >&#x20B9;{{$item[0]->price}}</h2>
                        @elseif($item[0]->offerprice!=0)
                        <div class="box">
                            <div class="ribbon red">
                                <span>{{$item[0]->offerpercent}}% off</span>
                            </div>
                        <a href="/products/show/{{$item[0]->prod_id}}">
                            <div class="small img-thumbnail">
                                <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item[0]->image}}" /></a> 
                                </div>
                        </a>
                        <h2 class="lead">
                            {{$item[0]->prod_name}} 
                        </h2> 
                        </div>
                        <h2 class="lead" >&#x20B9;{{$item[0]->offerprice}}</h2>
    
                        @else
                        <a href="/products/show/{{$item[0]->prod_id}}">
                            <div class="small img-thumbnail">
                                <img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item[0]->image}}" /></a> 
                                </div>
                        </a>
                        <h2 class="lead">
                            {{$item[0]->prod_name}} 
                        </h2> 
                        <h2 class="lead" >&#x20B9;{{$item[0]->price}}</h2>
                        @endif
                    <a class="btn btn-info text-white mb-1" href="/buys/cart/{{$item[0]->prod_id}}">BUY</a>
                    <a class=" mb-1" href="/cart/del/{{$item[0]->prod_id}}"><i style="color:black;" class="fa fa-trash ml-1 "></i></a>
                    </div>				
                    @endforeach
</div>
</div>
</div><br>
@endsection