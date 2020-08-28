@extends('seller.layouts.app')

@section('content')
<div class="container-fluid">
        @if($errors->any())
        <div class="alert alert-danger">
                <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
                <!--<h1>Seller {{ Auth::guard('seller')->user()->name }}</h1>-->

                <div class="card-body">
                    @if (count($post)>0)
                    <table class="table table-stripped col-sm-4 col-md-12 col-xl-12">
                    <h1>Your Products:</h1>
                    <tr>
                            <th><h3></h3></th>
                            <th><h3>Product</h3></th>
                            <th><h3>Category</h3></th>
                            <th><h3>Price(Rs)</h3></th>
                            <th><h3>OfferPrice(Rs)</h3></th>
                    </tr>
                    @foreach ($post as $item)
                        <tr>
                            <td><img class="img-thumbnail" src="/Pictures/{{$item->image}}" height="42" width="42" alt=""></td>
                            <td>{{$item->prod_name}}</td>
                            <td style="text-transform:capitalize">{{$item->category}}</td>
                            <td>&#x20B9;{{$item->price}}</td>
                            <td>
                                    <form action="/seller/offer/change" method="GET">
                                        {{ csrf_field() }}
                                        @if ($item->offerprice==0)
                                        <input type="hidden"  name="id" value="{{$item->id}}">
                                        <input name="offprice"  style="width:15%;border-radius:10%;" type="text">
                                       
                                        <button type="submit" class="ml-2 pl-2 btn btn-success"><i class="fa fa-check"></i></button>
                                        @else
                                        <a class="btn btn-danger" href="/seller/offer/remove/{{$item->id}}"><i class="fa fa-remove"></i></a>
                                        @endif
                                    </form> 
                            </td>
                        </tr>
                    @endforeach
                </table>
                @endif          
                    
                </div>
        </div>
    </div>
</div>
@endsection
