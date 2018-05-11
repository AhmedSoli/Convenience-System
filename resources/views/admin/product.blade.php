@extends('layouts.AdminPanel')
@section('content')
<div class="row w3-center">
	<h3 class="w3-tag w3-round w3-light-grey w3-padding">	
		{{$product->register}}€
	</h3>
</div>
<div class="container">
	@include('panels.ViewOrders')
</div>
<div class="container">
	@include('panels.ViewPayments')
</div>

@stop