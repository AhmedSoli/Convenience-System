@extends('layouts.AdminPanel')

@section('content')
<div class="row">
	@include('app.flash')
</div>
<div class="container w3-center">
	@include('forms.SearchPayments')
</div>
<div class="container-fluid">
	<div class="col-xs-3">
		<ul class="nav nav-pills nav-stacked">
			<li><a data-toggle="pill" href="#view_payments">View Payments</a></li>
			<li class="active"><a data-toggle="pill" href="#store_payment">Add Payments</a></li>
		</ul>
	</div>
	<div class="col-xs-9">
		
		<div class="tab-content w3-center">
			<div id="view_payments" class="tab-pane fade">
				@include('panels.ViewPayments')
			</div>
			<div id="store_payment" class="tab-pane fade in active">
				<div class="w3-container">	
					@include('forms.StorePayment')
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
		color: #030303;
		background-color: rgba(11, 25, 38, 0.15);
	}

</style>



@endsection