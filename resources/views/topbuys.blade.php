<div class="container-fluid">
	<div class="row">
		<div class="card col-md-12">
			<div class="row">
				@foreach ($topprod as $item)
				<div class="col-md-3">
				<a href="/products/show/{{$item->prod_id}}"><img class="img-thumbnail mt-2" style="height:160px;" alt="Image" src="/Pictures/{{$item->image}}" /></a>
					<h2 class="lead">
						{{$item->prod_name}} 
					</h2> 
				<h2 class="lead" >&#x20B9; {{$item->price}}</h2>
				<a class="btn btn-info text-white mb-1" href="/buys/{{$item->prod_id}}">BUY</a>
				</div>				
				@endforeach
			</div>
		</div>
	</div>
</div>