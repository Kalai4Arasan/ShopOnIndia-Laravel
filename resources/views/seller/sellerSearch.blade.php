@extends('seller.layouts.app')

@section('content')
    <h3>Search Results</h3><hr>
@if (count($prod)>0)
    <div class="container">
        <div class="col-md-12">
                <div class="row">
            @foreach ($prod as $item)
                    <div class="col-md-3 pt-4">
                    <a id="cloths" href="/products/cloths/kidswear/show/{{$item->prod_id}}">
                            <img class="img-thumbnail" style="height:160px;"  src="/Pictures/{{$item->image}}" />
                            </a>
                                <h3 >
                                    {{$item->prod_name}} 
                                </h3> 
                                <p>{{$item->description}}</p>
                            <h2 class="lead" >&#x20B9;{{$item->price}}</h2>
                            <a class="btn btn-secondary text-white" href="/product/{{$item->id}}/edit">Edit</a>
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