@extends('layouts.app')

@section('content')

    <!-- The Modal -->

  <div  class="modal fade" id="popup" role="dialog">

    <div style="max-width:800px" class="modal-dialog " >

      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title">Your Orders:</h4>

          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>

        </div>

        

        <!-- Modal body -->

        <div  class="modal-body">

                @if (count($buys)>0)

        <table class="table table-stripped col-sm-2">

            <tr>

                    <th><h2 class="lead">BuyerName</h2></th>

                    <th><h2 class="lead">Product</h2></th>

                    <th><h2 class="lead">Price(Rs)</h2></th>

                    <th><h2 class="lead">Status</h2></th>

                    <th><h2 class="lead">Actions</h2></th>

            </tr>

            @foreach ($buys as $item)

                <tr>

                    <td style="padding-top:5%;">{{$item->username}}</td>

                    <td style="padding-top:5%;">{{$item->prod_name}}</td>

                    <td style="padding-top:5%;">&#x20B9;{{$item->prod_price}}</td>

                    <td style="padding-top:5%;">{{$item->status}}</td>

                    <td style="padding-top:4%;" >

                    <div class="btn-group" role="group">

                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        More

                        </button>

                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                        <a class="dropdown-item text-dark" style="margin-right:20px;" href="/buy/{{$item->id}}/edit">Customize</a>

                        <a class="dropdown-item text-dark"  onclick="return confirm('Do you want to cancel your order?')" href="/buys/{{$item->id}}/destroy">Cancel</a>

                        <a class="dropdown-item text-dark" href="/file/download/{{$item->id}}">Details</a>

                        </div>

                    </div>

                    </td>

                </tr>

            @endforeach

        </table>

        @else

            <h1>No orders till now...</h1>

        @endif

        </div>

        

      </div>

    </div>

  </div>



    <div class="well">

        <h4 class="alert alert-success">

            You will get your orders within this week.if you want to verify your details <button style="border-radius:10px;" class="btn btn-info" data-toggle="modal" data-target="#popup">click here.</button>

        </h4>

    </div>

    

    <a class="btn btn-primary" style="float:right;" href="/">Go Home</a><br>

@endsection

