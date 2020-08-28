@extends('layouts.app')

@section('content')
<div class="container">
<title>Edit Your Order</title>
<a class="btn btn-primary" href="/">Go Back</a><hr>
<div class="container">
    {!! Form::open(['action'=>['buyform@update',$buys->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('username', 'UserName:')}}
        {{Form::text('username',Auth::user()->name,['class'=>'form-control border border-secondary','placeholder'=>'Enter the Username'])}}
    </div>
    <div class="form-group">
            {{Form::label('prodname', 'ProductName:')}}
            {{Form::text('prodname',$buys->prod_name,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$buys->prod_name])}}
        </div>
    <div class="form-group">
        {{Form::label('address', 'Address:')}}
        {{Form::text('street',$buys->street,['class'=>'form-control  border border-secondary @error("street") is-invalid @enderror','placeholder'=>'Enter the StreetName'])}}
        @error('street')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
         <br>
        {{Form::text('city',$buys->city,['class'=>'form-control border border-secondary @error("city") is-invalid @enderror','placeholder'=>'Enter the CityName'])}}
        @error('city')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
         <br>
        {{Form::text('state',$buys->state,['class'=>'form-control border border-secondary @error("state") is-invalid @enderror','placeholder'=>'Enter the StateName'])}}
        @error('state')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <div class="form-group">
            {{Form::label('prodprice', 'ProductPrice:')}}
            {{Form::text('prodprice',$buys->prod_price,['class'=>'form-control border border-light','readonly'=>'readonly','value'=>$buys->prod_price])}}
        </div>

    <div class="form-inline">
        {{Form::label('quantity', 'Quantity:')}}
        {{Form::text('quantity',$buys->quantity,['class'=>'form-control border border-secondary @error("qty") is-invalid @enderror ml-2 pr-2','placeholder'=>'No. of quantity'])}}
        @error('qty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <br>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
</div>
@endsection