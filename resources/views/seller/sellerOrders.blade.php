@extends('seller.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-6">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($post)>0)
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
                            <th><h3>Quantity</h3></th>
                            <th><h3>Send Status</h3></th>
                    </tr>
                    @foreach ($post as $item)
                        <tr>
                            <td>{{$item->username}}</td>
                            <td>{{$item->prod_name}}</td>
                            <td style="text-transform:capitalize">{{$item->category}}</td>
                            <td>{{$item->street}}</td>
                            <td>{{$item->city}}</td>
                            <td>{{$item->state}}</td>
                            <td>&#x20B9;{{$item->prod_price}}</td>
                            <td class="text-center">{{$item->quantity}}</td>
                            <td>
                                
                            @if($item->status!="OrderPlaced")
                            <div class="btn-group" role="group">
                            <a  class="btn btn-success" href="/seller/status/{{$item->id}}/OrderPlaced"><i class="fa fa-paper-plane "></i></a> 
                            </div>
                            <br> 
                            <p>send orderplaced status to the client.</p>
                            @else
                            <strong>Order Placed</strong>
                            @endif
                            </td>
                            <td>
                            <a  class="btn btn-danger" onclick="return confirm('Did you sent status notification to client?')" href="/seller/destroy/{{$item->id}}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <!--<a  class="btn btn-primary" href="/file/download">DownloadPDF</a>-->
                @else
                <img src="/Pictures/emoji.gif" height="400" width="400" alt="">
                <h4>nothing...</h4>
                @endif
                    
                    
                </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection
