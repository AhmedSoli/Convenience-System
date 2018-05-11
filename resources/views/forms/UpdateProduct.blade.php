<a class="btn btn-default" data-toggle="modal" href='#product-{{$product->id}}'>Edit </a>
<div class="modal fade" id="product-{{$product->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form action="/products/{{$product->id}}/update" method="POST">
					{{method_field('PATCH')}}
					{{ csrf_field() }}
					<div class="row">

						<div class="col-xs-6">
							<div class="form-group">
								<label for="quantity">Quantity</label>
								<input class="form-control" id="quantity"  type="text" name="quantity" value="{{$product->quantity}}"> 
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="price">Price</label>
								<input class="form-control" id="price"  type="text" name="price" value="{{$product->price}}"> 
							</div>
						</div>
					</div>
					<div class="row">
					<div class="form-group w3-padding">
							<label for="photo">Photo path:</label>
							<input class="form-control" id="photo" placeholder="Note that most photos are stored in the images folder" type="text" name="photo" value="{{$product->photo}}"> 
						</div>
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Save changes</button>
				</div>
			</form>

		</div>
	</div>
</div>