@extends('layouts.App')	

@section('content')
<div class="row w3-margin">
	<a href="/app"><img src="/Images/back.png" alt="Back Button" height="40px">
	</a>
	@include('app.flash')
</div>
<div class="row w3-center">
	<h4>Credit : <span class="w3-round w3-tag w3-light-grey">{{$consumer->betrag}}€</span></h4>
</div>
<div class="row w3-center" style="margin-right:auto;margin-left:auto;">
	<div class="table">
		<div class="col-xs-4 w3-light-grey w3-border">Drink</div>
		<div class="col-xs-2 w3-light-grey w3-border">Quantity</div>	
		<div class="col-xs-2 w3-light-grey w3-border">Cost</div>	
		<div class="col-xs-4 w3-light-grey w3-border">Bought at</div>
		@foreach ($orders as $order)
		<div class="row w3-border-bottom">
			<div class="col-xs-4">
				{{$order->product->name}}
			</div>
			<div class="col-xs-2">
				{{$order->quantity}}
			</div>
			<div class="col-xs-2">
				{{$order->cost}}
			</div>
			<div class="col-xs-4">
				{{$order->created_at}}
			</div>
		</div>
		@endforeach
	</div>
</div>

@stop

