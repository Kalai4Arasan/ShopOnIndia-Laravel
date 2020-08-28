@extends('seller.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <th><h3>Tasks</h3></th>
                    </tr>
                    @foreach ($post as $item)
                        <tr>
                            <td><img class="img-thumbnail" src="/Pictures/{{$item->image}}" height="42" width="42" alt=""></td>
                            <td>{{$item->prod_name}}</td>
                            <td style="text-transform:capitalize">{{$item->category}}</td>
                            <td>&#x20B9;{{$item->price}}</td>
                            <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                                </button>
                                <div class="dropdown-menu bg-secondary" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" style="margin-right:20px;"href="/product/{{$item->id}}/edit">Edit</a>
                                <a class="dropdown-item" onclick="return confirm('Are you sure you want delete your product?')" href="/products/{{$item->id}}/destroy">Delete</a>
                                </div>
                            </div>
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
