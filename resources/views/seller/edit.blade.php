@extends('seller.layouts.app')

@section('content')
<div class="container">
<title>Edit Your Order</title>
<a class="btn btn-primary" href="/">Go Back</a><hr>
<div class="container">
    {!! Form::open(['action'=>['ProductsController@update',$prod->id],'method'=>'POST','files'=>true]) !!}
    <div class="form-group">
        {{Form::label('productName', 'ProductName:')}}
        {{Form::text('productName',$prod->prod_name,['class'=>'form-control','placeholder'=>'Enter the ProductName'])}}
    </div>
    <div class="form-group">
            {{Form::label('productCategory', 'ProductCartegory')}}
            <select name="productCategory" class="form-control browser-default custom-select custom-select-lg mb-3" id="productCategory">
                    <option></option>
                    <option>smartphone</option>
                    <option>kidswear</option>
                    <option>womenwear</option>
                    <option>menwear</option>
            </select>
    </div>
    <div class="form-group">
        {{Form::label('productPrice', 'Price:')}}
        {{Form::text('productPrice',$prod->price,['class'=>'form-control','placeholder'=>'Enter the Price of the Product'])}}
    </div>
    <div class="form-group">
        {{Form::label('productDescription', 'Description:')}}
        {{Form::textArea('productDescription','',['id'=>'editor','class'=>'form-control','placeholder'=>'Enter the Product Description'])}}
    </div>
    <div class="form-group">
        {{Form::label('productImage', 'Upload the Image of the Product:')}}
        {{Form::file('productImage',['class'=>'pl-2'])}}
    </div>
    
    <br>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
</div>
@endsection