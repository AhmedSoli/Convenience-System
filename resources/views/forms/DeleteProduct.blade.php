<form method="POST" action="/products/{{$product->id}}/delete">
	{{ csrf_field() }}
	<div class="form-group">
		<button type="submit" class="btn btn-default"><img src="/images/cancel.png" style="height:30px;" alt=""></button>
	</div>
</form>