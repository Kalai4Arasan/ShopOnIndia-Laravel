@extends('seller.layouts.app')

@section('content')

<div class="container">
<title>ProductPost</title>
<a class="btn btn-primary" href="/seller">Go Back</a><hr>
<div class="container">
    {{ Form::open(['action'=>'ProductsController@store','method'=>'POST','files'=>true]) }}
    <div class="form-group">
        {{Form::label('productName', 'ProductName:')}}
        {{Form::text('productName','',['class'=>'form-control border border-secondary @error("productName") is-invalid @enderror','placeholder'=>'Enter the ProductName'])}}
        @error('productName')
        <span role="alert">
                <h6 class="text text-danger">{{$message}}</h6>
                </span>
         @enderror
    </div>
    <div class="form-group">
            {{Form::label('productCategory', 'ProductCartegory')}}
            <select name="productCategory" class="form-control border border-secondary browser-default custom-select custom-select-lg mb-3 @error("productCategory") is-invalid @enderror " id="productCategory">
                    <option>smartphone</option>
                    <option>kidswear</option>
                    <option>womenwear</option>
                    <option>menwear</option>
            </select>
            @error('productCategory')
            <span role="alert">
                    <h6 class="text text-danger">{{$message}}</h6>
                    </span>
             @enderror   

    </div>
    <div class="form-group">
        {{Form::label('productPrice', 'Price:')}}
        {{Form::text('productPrice','',['type'=>'number','class'=>'form-control border border-secondary @error("productPrice") is-invalid @enderror ','placeholder'=>'Enter the Price of the Product'])}}
        @error('productPrice')
        <span role="alert">
                <h6 class="text text-danger">{{$message}}</h6>
                </span>
         @enderror
    </div>
    <div class="form-group">
        {{Form::label('productDescription', 'Description:')}}
        {{Form::textArea('productDescription','',['class'=>'form-control border border-secondary @error("productDescription") is-invalid @enderror ','placeholder'=>'Enter the Product Description'])}}
        @error('productDescription')
        <span role="alert">
                <h6 class="text text-danger">{{$message}}</h6>
                </span>
         @enderror
    </div>
    <div id="files" class="form-group">
        {{Form::label('productImage', 'Upload the Image of the Product:')}}
        <!--<label for="productImage">
            <i class="fa fa-upload"></i>
        </label>-->
        {{Form::file('productImage',['class'=>'pl-2   @error("productImage") is-invalid @enderror '])}}
        @error('productImage')
        <span role="alert">
        <h6 class="text text-danger">{{$message}}</h6>
        </span>
         @enderror
    </div>
    
    <br>
        {{Form::submit('Post',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
</div>
</div>
@endsection