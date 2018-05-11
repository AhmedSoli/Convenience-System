@extends('layouts.AdminPanel')
@section('content')

<div class="row w3-center">
	@include('app.flash')
</div>
<div class="container w3-center">
	<form  method="POST" action="/transfer/search">
		{{ csrf_field() }}
		<div class="form-group" style="display:inline-block;">
			<label for="booking_number">Booking Number</label>
			<input required class="awesomplete required w3-input" type="text" name="booking_number" value="{{old('booking_number')}}" name="name" list="mylist" />
			<datalist id="mylist">
				@foreach ($consumers_transactions as $consumers_transaction)
				<option>{{$consumers_transaction->booking_number}}</option>
				@endforeach
			</datalist>
		</div>					
		<div class="form-group" style="display:inline-block;">
			<button type="submit" class="btn btn-default" style="border:0px;"><img src="/images/search.png" alt="search icon" style="height:40px;"></button>
		</div>
	</form>
</div>

<div class="container-fluid">
	<div class="col-xs-3">
		<ul class="nav nav-pills nav-stacked">
			<li><a data-toggle="pill" href="#transactions">View Consumers Transactions</a></li>
			<li><a data-toggle="pill" href="#registers_transactions">View Registers Transactions</a></li>
			<li class="active"><a data-toggle="pill" href="#positive_charge">Charge +</a></li>
			<li><a data-toggle="pill" href="#negative_charge">Charge -</a></li>
			<li><a data-toggle="pill" href="#transfer">Transfer (Consumers)</a></li>
			<li ><a data-toggle="pill" href="#registers_transfer">Transfer (Registers)</a></li>
		</ul>
	</div>
	<div class="col-xs-9">
		
		<div class="tab-content w3-center">
			<div id="transactions" class="tab-pane fade in">
				@include('panels.ViewTransactions')
			</div>
			<div id="registers_transactions" class="tab-pane fade in">
				@include('panels.ViewRegistersTransactions')
			</div>
			<div id="transfer" class="tab-pane fade">
				@include('forms.StoreTransfer')
			</div>
			<div id="registers_transfer" class="tab-pane">
				@include('forms.StoreRegistersTransfer')
			</div>
			<div id="positive_charge" class="tab-pane fade in active">
				@include('forms.StorePositiveTransfer')
			</div>
			<div id="negative_charge" class="tab-pane fade">
				@include('forms.StoreNegativeTransfer')
			</div>

		</div>
	</div>
	<style>
		.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
			color: #030303;
			background-color: rgba(11, 25, 38, 0.15);
		}

	</style>


</div>

@stop