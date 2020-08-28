@extends('layouts.app')

@section('content')
<div class="container">
<title>Buy</title>
<a class="btn btn-primary" href="/">Go Back</a><hr>
<div class="container">
    {{ Form::open(['action'=>['buyform@cartBuy',$posts->prod_id],'method'=>'POST']) }}
    <div class="form-group">
        {{Form::label('username', 'UserName:')}}
        {{Form::text('username',Auth::user()->name,['class'=>'form-control border border-secondary','placeholder'=>'Enter the Username'])}}
    </div>
    <div class="form-group">
            {{Form::label('prodname', 'ProductName:')}}
            {{Form::hidden('prodid',$posts->prod_id)}}
            {{Form::hidden('image',$posts->image)}}
            {{Form::hidden('seller_id',$posts->seller_id)}}
            {{Form::text('prodname',$posts->prod_name,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$posts->prod_name])}}
        </div>
        <div class="form-group">
                {{Form::hidden('prodcategory',$posts->category,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$posts->category])}}
            </div>

    <div class="form-group">
        {{Form::label('address', 'Address:')}}
        {{Form::text('street','',['class'=>'form-control  border border-secondary @error("street") is-invalid @enderror','placeholder'=>'Enter the StreetName'])}}
        @error('street')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
         <br>
        {{Form::text('city','',['class'=>'form-control border border-secondary @error("city") is-invalid @enderror','placeholder'=>'Enter the CityName'])}}
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
         <br>
        {{Form::text('state','',['class'=>'form-control border border-secondary @error("state") is-invalid @enderror','placeholder'=>'Enter the StateName'])}}
        @error('state')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    @if ($posts->offerprice==0)
    <div class="form-group">
            {{Form::label('prodprice', 'ProductPrice:')}}
            {{Form::text('prodprice',$posts->price,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$posts->price])}}
        </div>
    @else
    <div class="form-group">
            {{Form::label('prodprice', 'ProductPrice:')}}
            {{Form::text('prodprice',$posts->offerprice,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$posts->offerprice])}}
        </div>
    @endif
    <div class="form-inline">
        {{Form::label('quantity', 'Quantity:')}}
        {{Form::number('quantity','',['class'=>'form-control border border-secondary @error("qty") is-invalid @enderror ml-2 pr-2','placeholder'=>'No. of quantity','min'=>'0'])}}
        @error('qty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <br>
    {{Form::submit('Buy',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
</div>
</div>
@endsection