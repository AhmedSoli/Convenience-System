<form class="w3-center" method="POST" action="admins/transfer">
	{{ method_field('PATCH')}}
	{{ csrf_field() }}
	<h3 class="w3-tag w3-padding w3-round w3-light-grey">Transfer</h3>
	
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group w3-center">
				<label for="sender">Sender</label>
				<select name="sender_id" class="w3-select w3-border">
					@foreach ($admins as $admin)
					<option value="{{$admin->id}}">{{$admin->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group w3-center">
				<label for="sender">Reciever</label>
				<select name="reciever_id" class="w3-select w3-border">
					@foreach ($admins as $admin)
					<option value="{{$admin->id}}">{{$admin->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<div class="form-group w3-center">
				<label for="amount">Amount</label>
				<input required class="form-control" id="amount"  name="betrag" value="{{old('amount')}}"> 
			</div>
		</div>
		<div class="col-xs-8">
			<div class="form-group">
				<label for="note">Note</label>
				<input class="form-control" id="note" type="text" name="note" value="{{old('note')}}"> 
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<label for="booking_number">Booking Number</label>
		<input class="form-control" id="booking_number" type="text" name="booking_number" value="{{old('booking_number')}}"> 
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-info btn-block">Transfer</button>
	</div>
</form>