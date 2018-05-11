<form  method="POST" action="/payments/search">
	{{ csrf_field() }}
	<div class="form-group" style="display:inline-block;">
		<label for="booking_number">Booking Number</label>
		<input required class="awesomplete w3-center w3-input" type="text" name="booking_number" value="{{old('booking_number')}}" name="name" list="mylist" />
		<datalist id="mylist">
			@foreach ($payments as $payment)
			<option>{{$payment->booking_number}}</option>
			@endforeach
		</datalist>
	</div>					
	<div class="form-group" style="display:inline-block;">
		<button type="submit" class="btn btn-default" style="border:0px;"><img src="/images/search.png" style="height:40px;" alt="search icon"></button>
	</div>

</form>