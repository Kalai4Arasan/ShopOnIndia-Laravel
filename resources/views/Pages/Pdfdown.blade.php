<html>
<head>
 <!-- fonts awesome-->
 <link href=“https://maxcdn.bootstrapcdn.com/font-awesome/5.7.0/css/font-awesome.min.css” rel="stylesheet"/>
 <script src="https://use.fontawesome.com/7570afeaa1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<style>
    #qrcode {
  width:160px;
  height:160px;
  margin-top:15px;
}
    .btn{
       border-radius: 2%;
    }
    .btn:hover{
        background-color:lightblue;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>
<body class="col-md-12 col-sm-2" style="font-family: 'Source Sans Pro', sans-serif;">
@if (count($buys)>0)

<h1 ><a class="btn btn-primary" href="/Products/bought"><i style="float:left;margin-top:1%;" class="fa fa-arrow-left"></i></a><img src="/Pictures/png1.png" style="margin-top:1%;margin-left:30%;" width="60">ShopOnIndia</h1>
<hr>
<div class="d-flex align-items-center">
    <table style="margin-left:30%;" >
    @foreach ($buys as $item)
    <tr><td><h3 class="font-weight-bold">BuyerName</h3></td><td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->username}}</h3></td></tr>
    <tr><td><h3 class="font-weight-bold">Product</h3></td>  <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->prod_name}}</h3></td></tr>
    <tr><td><h3 class="font-weight-bold">Category</h3></td>  <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;text-transform:capitalize;"><h3>{{$item->category}}</h3></td></tr>
    <tr><td><h3 class="font-weight-bold">Street</h3></td>   <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->street}}</h3></td></tr>
    <tr><td><h3 class="font-weight-bold">City</h3></td>     <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->city}}</h3></td> </tr>
    <tr><td><h3 class="font-weight-bold">State</h3></td>    <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->state}}</h3></td>  </tr>
    <tr><td><h3 class="font-weight-bold">Price(total)</td>  <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>Rs.{{$item->prod_price}}/-</h3></td> </tr>
    <tr><td><h3 class="font-weight-bold">Quantity</td>      <td style="padding-left:5%;"><h3>:</h3></td> <td style="padding-left:10%;"><h3>{{$item->quantity}}</h3></td> </tr>
    @endforeach
    </table>
    </div>
@else
    <h1>No orders</h1>
@endif
@foreach ($buys as $item)
<input id="text" type="hidden" value="{{$item->username}} {{$item->securekey}}" style="width:80%" /><br />
<h3 style="margin-left:20%">To verify your order check this QRCode:</h3>
<div style="margin-left:30%;;margin-top:2%;" id="qrcode"></div>
    <div class="card" id="qrcode"></div>
@endforeach

@foreach ($buys as $item)

    <button class="btn btn-rounded btn-primary" onclick="window.print()" style="margin-top:2%;margin-left:1%;"><i class="fa fa-print"> print</i></button>
    @endforeach
    <br><br>

</body>
<script>
    var qrcode = new QRCode("qrcode");

    $(window).load(function() {      
    var Text = document.getElementById("text");

    qrcode.makeCode(Text.value);
    });

</script>
</html>