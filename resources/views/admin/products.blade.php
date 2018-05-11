@extends('layouts.AdminPanel')

@section('content')
<div class="container">
	<div class="row w3-margin w3-padding">
		<span  data-toggle="tooltip" title="Add new product" class="pull-right">
			<a  data-toggle="modal" data-target="#addproduct"><img src="/images/add.png" height="40px"></a>
		</span>
	</div>
	<div class="row">
		@foreach ($products as $product)
		<div class="col-sm-5  col-md-3 - w3-card-4 w3-center" style="margin:20px;padding:5px;">
			<div class="row">
				<div class="pull-left">
					@include('forms.UpdateProduct')
				</div>
				<div class="pull-right">
					@include('forms.DeleteProduct')
				</div>
			</div>
			<div class="row">
				<a type="button" class="btn btn-default" href="products/{{$product->id}}" data-toggle="tooltip" title="Press to see product history" style="width:90%;">
					<img class=" w3-center w3-round-jumbo" height="150px" src="/images/{{$product->photo}}">
				</a>
			</div>
			<div class="row">
					<b>Name: </b>
					{{$product->name}}
			</div>
			<div class="row">
				<b>Price: </b>
					{{$product->price}}€
			</div>
			<div class="row">
			<b>Register:</b>
				{{$product->register}}€
			</div>
		</div>
		@endforeach
	</div>

</div>

<div class="container">
	<!-- Modal -->
	<div id="addproduct" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header w3-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="w3-tag w3-light-grey w3-round w3-padding">Add new product</h2>
				</h4>
			</div>
			<div class="modal-body">
				<div class="w3-container">	
					@include('forms.StoreProduct')
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

@endsection
