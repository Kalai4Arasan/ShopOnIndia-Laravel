  @extends('layouts.app')

	@section('content')
	<title>ShoppIndia</title>
			<div class="carousel slide carousel-fade pl-2 pr-2 d-sm-flex" id="carousel-471668">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-471668" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-471668">
					</li>
					<li data-slide-to="2" data-target="#carousel-471668">
					</li>
				</ol>
				<div class="carousel-inner" >
					<div class="carousel-item active">
						<a href="/"><img style=" width:100%;  !important;" class="d-block" src="/Pictures/r1.jpg"></a>
					</div>
					<div class="carousel-item">
						<a href="/"><img style=" width:100%;  !important;" class="d-block" src="/Pictures/r2.jpg"></a>
					</div>
					<div class="carousel-item">
						<a href="/"><img style=" width:100%;  !important;" class="d-block"  src="/Pictures/r3.jpg"></a>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-471668" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-471668" data-slide="next">
					<span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
  </div>
  <hr>
  @if(auth()->check())
  <h3 class="lead">Suggestions</h3>
  <div class="container-fluid">
	<div class="row">
		<div class="card col-md-12">
			<div class="row">	
				@foreach ($prod as $item)
				<div class="col-md-3">
					@if($item->offerprice>0 && $item->popular!=0) 
					<div class="box">
						<div class="ribbon red">
							<span><i class="fa fa-star mr-1"></i>{{$item->offerpercent}}% off</span>
						</div>
							<a href="/products/show/{{$item->prod_id}}">
								<div class="small img-thumbnail">
								<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
								</div>
							<h2 class="lead">
							{{$item->prod_name}} 
						</h2>
					</div> 
					<h2 class="lead">&#x20B9;{{$item->offerprice}}</h2>
					@elseif ($item->popular==1)
					<div class="box">
						<div class="ribbon">
							<span><i class="fa fa-star"></i></span>
						</div>
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					</div>
					<h2 class="lead" >&#x20B9;{{$item->price}}</h2>
					@elseif($item->offerprice!=0)
					<div class="box">
						<div class="ribbon red">
							<span>{{$item->offerpercent}}% off</span>
						</div>
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					</div>
					<h2 class="lead" >&#x20B9;{{$item->offerprice}}</h2>

					@else
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					<h2 class="lead" >&#x20B9;{{$item->price}}</h2>
					@endif
					<div  ng-controller="cont">
						<a class="btn btn-info text-white mb-2" href="/buys/{{$item->prod_id}}">BUY</a>
					 <button id="idnp{{$item->id}}  " class="btn btn-outline-warning mb-2" onclick="load(this.id)" ng-click="insert({{$item->prod_id}})" ><i class="fas fa-cart-plus "></i></button>
						</div>
					
				</div>				
				@endforeach
			</div>
		</div>
	</div>
</div>
@if (count($topprod)>=4)
<hr>
<h3 class="lead">Top Buys</h3>
<div class="container-fluid">
	<div class="row">
		<div class="card col-md-12">
			<div class="row">
				@foreach ($topprod as $item)
				<div class="col-md-3">
					@if($item->offerprice>0 && $item->popular!=0) 
					<div class="box">
						<div class="ribbon red">
							<span><i class="fa fa-star mr-1"></i>{{$item->offerpercent}}% off</span>
						</div>
							<a href="/products/show/{{$item->prod_id}}">
								<div class="small img-thumbnail">
								<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
								</div>
							<h2 class="lead">
							{{$item->prod_name}} 
						</h2>
					</div> 
					<h2 class="lead">&#x20B9;{{$item->offerprice}}</h2>
					@elseif ($item->popular==1)
					<div class="box">
						<div class="ribbon">
							<span><i class="fa fa-star"></i></span>
						</div>
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					</div>
					<h2 class="lead" >&#x20B9;{{$item->price}}</h2>
					@elseif($item->offerprice!=0)
					<div class="box">
						<div class="ribbon red">
							<span>{{$item->offerpercent}}% off</span>
						</div>
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					</div>
					<h2 class="lead" >&#x20B9;{{$item->offerprice}}</h2>

					@else
					<a href="/products/show/{{$item->prod_id}}">
						<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
					</a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
					<h2 class="lead" >&#x20B9;{{$item->price}}</h2>
					@endif
					<div  ng-controller="cont">
						<a class="btn btn-info text-white mb-2" href="/buys/{{$item->prod_id}}">BUY</a>
						<button id="ido{{$item->id}}" class="btn btn-outline-warning mb-2" onclick="load(this.id)" ng-click="insert({{$item->prod_id}})" ><i class="fas fa-cart-plus "></i></button>
						</div>
				</div>				
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif
@endif
@if (count($offer)>0)
<hr>
<h3 class="lead">Offers</h3>
<div class="container-fluid">
	<div class="row">
		<div class="card col-md-12">
			<div class="row">
				@foreach ($offer as $item)
				<div class="col-md-3 pt-4">
					<div class="box">
						<div class="ribbon red">
							<span>{{$item->offerpercent}}% off</span>
						</div>
							<a id="cloths" href="/products/cloths/kidswear/show/{{$item->prod_id}}">
							<div class="small img-thumbnail">
							<img class="" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a> 
							</div>
							</a>
							<h2 class="lead">
							{{$item->prod_name}}
							</h2> 
					</div>
							<h2 class="lead">&#x20B9;{{$item->offerprice}}</h2>
							<div  ng-controller="cont">
							 <a class="btn btn-info text-white mb-2" href="/buys/{{$item->prod_id}}">BUY</a>
							 <button id="idp{{$item->id}}" class="btn btn-outline-warning mb-2" onclick="load(this.id)" ng-click="insert({{$item->prod_id}})" ><i class="fas fa-cart-plus "></i></button>
							 </div>
					</div>			
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif
@endsection


