<form  method="POST" action="/payments/store">
	{{ csrf_field() }}
	<h3 class="w3-tag w3-padding w3-round w3-light-grey">Add Payment</h3>

	<div class="row">
		<div class="form-group">
			<label for="note">Note</label>
			<select required class="form-control" name="note"  value="{{old('note')}}">
				<option>Pfand</option>
				<option>Getränke</option>
				<option>Pfandrückgabe</option>
				<option>Zucker</option>
				<option>Milch</option>
				<option>Kaffee</option>
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="category">Category</label>
				<select name="product_id" class="w3-select w3-border">
					@foreach ($products as $product)
					<option value="{{$product->id}}">{{$product->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label for="price">Price</label>
				<input required class="form-control" id="price"   name="amount" value="{{old('amount')}}"> 
			</div>
		</div>
	</div>	
	<div class="form-group">
		<label for="booking_number">Booking Number</label>
		<input required class="form-control" id="booking_number" type="text" name="booking_number" value="{{old('booking_number')}}"> 
	</div>					
	<div class="form-group">
		<button type="submit" class="btn btn-default btn-block">Submit</button>
	</div>

</form>