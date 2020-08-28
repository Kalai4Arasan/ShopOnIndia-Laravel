@extends('layouts.app')

@section('content')
<div class="container">
<title>ProductPost</title>
<a class="btn btn-primary" href="/">Go Back</a><hr>
<div class="container">
    {{ Form::open(['action'=>'ProductsController@store','method'=>'POST','files'=>true]) }}
    <div class="form-group">
        {{Form::label('productName', 'ProductName:')}}
        {{Form::text('productName','',['class'=>'form-control @error("productname") is-invalid @enderror','placeholder'=>'Enter the ProductName'])}}
        @error('productname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <div class="form-group">
            {{Form::label('productCategory', 'ProductCartegory')}}
            <select name="productCategory" class="form-control browser-default custom-select custom-select-lg mb-3 @error("productCategory") is-invalid @enderror " id="productCategory">
                    <option>smartphone</option>
                    <option>kidswear</option>
                    <option>womenwear</option>
                    <option>menwear</option>
            </select>
            @error('productCategory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror   

    </div>
    <div class="form-group">
        {{Form::label('productPrice', 'Price:')}}
        {{Form::text('productPrice','',['class'=>'form-control @error("productPrice") is-invalid @enderror ','placeholder'=>'Enter the Price of the Product'])}}
        @error('productPrice')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <div class="form-group">
        {{Form::label('productDescription', 'Description:')}}
        {{Form::textArea('productDescription','',['id'=>'editor','class'=>'form-control @error("productDescription") is-invalid @enderror ','placeholder'=>'Enter the Product Description'])}}
        @error('productDescription')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    <div class="form-group">
        {{Form::label('productImage', 'Upload the Image of the Product:')}}
        {{Form::file('productImage',['class'=>'pl-2 @error("productImage") is-invalid @enderror '])}}
        @error('productImage')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
    </div>
    
    <br>
        {!!Form::submit('Post',['class'=>'btn btn-primary'])!!}
    {{ Form::close() }}
</div>
</div>
@endsection