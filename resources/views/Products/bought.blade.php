@extends('layouts.app')

@section('content')
@if (count($buys)>0)
<table class="table table-stripped col-sm-4 col-md-12 col-xl-12">
    <h1>Your Orders:</h1>
    <tr>
            <th><h3>BuyerName</h3></th>
            <th><h3>Product</h3></th>
            <th><h3>Category</h3></th>
            <th><h3>Street</h3></th>
            <th><h3>City</h3></th>
            <th><h3>State</h3></th>
            <th><h3>Price(Rs)</h3></th>
            <th><h3>Status</h3></th>
            <th><h3>Quantity</h3></th>
            <th><h3>Tasks</h3></th>
    </tr>
    @foreach ($buys as $item)
        <tr>
            <td>{{$item->username}}</td>
            <td>{{$item->prod_name}}</td>
            <td style="text-transform:capitalize">{{$item->category}}</td>
            <td>{{$item->street}}</td>
            <td>{{$item->city}}</td>
            <td>{{$item->state}}</td>
            <td>&#x20B9;{{$item->prod_price}}</td>
            <td>{{$item->status}}</td>
            <td class="text-center">{{$item->quantity}}</td>
            <td>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
                </button>
                <div class="dropdown-menu bg-secondary" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" style="margin-right:20px;" href="/buy/{{$item->id}}/edit">Customize</a>
                <a class="dropdown-item" onclick="return confirm('Do you want to cancel your order?')" href="/buys/{{$item->id}}/destroy">Cancel</a>
                <a class="dropdown-item" href="/file/download/{{$item->id}}">Details</a>
                </div>
            </div>
            </td>
        </tr>
    @endforeach
</table>
<!--<a  class="btn btn-primary" href="/file/download">DownloadPDF</a>-->
@else
    <h1>No orders till now...</h1>
@endif
@endsection