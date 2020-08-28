@extends('layouts.app')

@section('content')

@if (count($data)>0)
@foreach ($data as $item)
<div class="container"><h1 class="text-uppercase">{{$item->category}}</h1></div>
<hr>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
            <img class="img-thumbnail" style="height:400px; width:200px;" src="/Pictures/{{$item->image}}" height="400" width="400" alt="">
            </div>
            <div class="col-md-4 col-sm-3">
                <h1>{{$item->prod_name}}</h1>
                <p>{!!$item->description!!}</p>
                @if ($item->offerprice==0)
                <h2 class="lead" >&#x20B9;{{$item->price}}</h2>
                @else
                <h2 class="lead text-danger">&#x20B9;{{$item->offerprice}}</h2>
                <h2 class="lead" ><strike>&#x20B9;{{$item->price}}</strike>  &nbsp; ({{$item->offerpercent}}% off)</h2>
                @endif
                <a class="btn btn-info text-white" href="/buys/{{$item->prod_id}}">BUY</a>
                </div>
                <div class="row pl-3">
                    
                </div>
        </div><br>
        
    </div>
@endforeach
@endif
@endsection