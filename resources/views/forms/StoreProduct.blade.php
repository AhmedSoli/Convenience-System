<form  method="POST" action="/products/store">
	<div class="col-xs-6">
		<label class="w3-label w3-text-black">product's name</label>
		<input class="w3-input w3-border" type="text" name="name"></input>
	</div>
	<div class="col-xs-6">
		<label class="w3-label w3-text-black">Photo</label>
		<input class="w3-input w3-border" type="text" name="photo"></input>
	</div>
	<div class="col-xs-6">
		<label class="w3-label w3-text-black">Price</label>
		<input class="w3-input w3-border" type="text" name="price"></input>
	</div>
	<div class="col-xs-6">
		<label class="w3-label w3-text-black">Quantity</label>
		<input class="w3-input w3-border" type="text" name="quantity"></input>
	</div>
	<div class="col-xs-6">
		<label class="w3-label w3-text-black">Register Money</label>
		<input class="w3-input w3-border" type="text" name="register"></input>
	</div>
	<button class="w3-white w3-border w3-btn w3-btn-block w3-padding-32 w3-margin-top" type="submit">Submit</button>
	{{ csrf_field() }}
</form>