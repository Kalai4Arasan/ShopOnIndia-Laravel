@extends('layouts.app')

@section('content')
@if (count($data)>0)
<div class="container">
        @foreach ($data as $item)
        <h3 class="lead">Username:  {{$item->username}}</h3>
           <h3 class="lead"> Street:  {{$item->street}} </h3>
            <h3 class="lead">City: {{$item->city}}</h3>
           <h3 class="lead"> State: {{$item->state}}</h3>
           <h3 class="lead"> Quatity: {{$item->quantity}}</h3>
           <hr>
        @endforeach
@endif
    </div>
    <div class="well container">
            <a class="btn btn-primary" href="/">Go Back</a>
    </div>
@endsection