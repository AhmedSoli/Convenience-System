@extends('layouts.App')

@section('content')


@include('app.flash')

<!-- Listing all prducts with their modals -->

<div class="row w3-padding-jumbo">
	@foreach ($products as $product)

	<div class="col-sm-{{12 / count($products)}} col-xs-12">
		<div class="row w3-center">
			<h2 style="font-color:#96897f" class="w3-tag w3-round w3-padding w3-light-grey">{{$product->name}}</h2>
		</div>
		<div class="row w3-center">
			<a id="{{$product->name}}" style="cursor:pointer" data-toggle="modal" data-target="#{{$product->name}}_modal">
				<img class="w3-padding w3-round-jumbo" height="200px" alt="{{$product->name}}" src="/images/{{$product->photo}}">
			</a>

		</div>
		<div class="row w3-center">
			<h3  style="color:#625750">{{$product->price}}€</h3>
		</div>
	</div>

	<!-- Modal -->
	<div id="{{$product->name}}_modal" class="modal fade" role="dialog" style="opacity:0.85;">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="w3-center">
						<div class="row block-center">
							<button  type="button" class="btn btn-default w3-padding" id="remove_quantity{{$product->
								id}}"  style="display:inline-block;">
								<img src="/images/down-arrow.png" alt="Down Arrow" style="height:30px">
							</button>
							<h4 id="display_quantity{{$product->id}}" style="display:inline-block; font-size: 20px">1</h4>
							<h4 style="display:inline-block; font-size: 20px">x</h4>
							<img src="/images/{{$product->photo}}" alt="{{$product->name}}" style="display:inline-block; height:60px;">
							<h4 style="display:inline-block; font-size: 20px">=</h4>
							<h4 id="display_price{{$product->id}}" style="display:inline-block; font-size: 20px"> {{$product->price}}</h4>
							<h4 style="display:inline-block; font-size: 20px"> €</h4>
							<button type="button" class="btn btn-default w3-padding" id="add_quantity{{$product->id}}" style="display:inline-block;">
								<img src="/images/up-arrow.png" alt="Up Arrow" style="height:30px">
							</button>
						</div>	
					</div>
				</div>
				<div class="modal-body">
					
					<div class="row">

						<form method="POST" action="/app/{{$product->id}}" id="{{$product->name}}key_form">
							<div id="{{$product->name}}key" class="w3-center ">
								<div class="row w3-padding w3-animate-fading">
									<img src="/images/sensor.png" alt="sensor" style="height:30px;" class="w3-spin">
									<p>Detecting key... </p>											
								</div>
								<div class="row w3-padding">
									<input required style="background-color: rgba(0,0,0,0);" type="password" name="key_id" id="{{$product->name}}key_id">
									{{ csrf_field() }}
								</div>
								<input hidden id="quantity{{$product->id}}"  name="quantity" value="1">
								<div class="row">
									<button type="button" class="btn btn-default" onclick="manuallogin('{{$product->name}}')">Manual Login</button>
								</div>	
							</div>
						</form>
						<form id="{{$product->name}}form" class="w3-center" method="POST" action="/app/{{$product->id}}" onsubmit="return validateInfo('{{$product->name}}form')">
							{{ csrf_field() }}
							<input required hidden id="{{$product->id}}password" name="password">
							<input hidden id="quantity{{$product->id}}2"  name="quantity" value="1">
							<div class="form-group">
								<span class="label label-default">ID:</span>
								<div class="text-center" id="ex{{$product->id}}CurrentSliderValLabel">Current Slider Value: <span id="ex{{$product->id}}SliderVal">0</span></div>
								<input required id="ex{{$product->id}}" type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="0" style="width:100%" name="id"/>

							</div>
							<div class="form-group">
								<span class="label label-default">Password:</span>
								<div class="patternContainer" style="background-color:rgba(0,0,0,0);" id="patternContainer{{$product->id}}"></div>
							</div>
						</form>
						
					</div>

				</div>

			</div>
		</div>

	</div>
	<script>
		$("#ex{{$product->id}}").slider();
		$("#ex{{$product->id}}").on("slide", function(slideEvt) {
			$("#ex{{$product->id}}SliderVal").text(slideEvt.value);
		});
		var {{$product->name}}lock = new PatternLock("#patternContainer{{$product->id}}",{
			onDraw:function(pattern){
				$('#{{$product->id}}password').val({{$product->name}}lock.getPattern());
				$("#{{$product->name}}form").submit();
			}
		});
		$("#{{$product->name}}form").hide();
		$('#{{$product->name}}_modal').on('shown.bs.modal', function (e) {
			$('#{{$product->name}}key_id').focus();
			$("#{{$product->name}}form").hide();
			$("#{{$product->name}}key").show();
		})
		$('#{{$product->name}}key_id').keyup(function () {
			if (this.value.length == 10) {
				$('#{{$product->name}}key_form').submit();
			}
		});
		$('#add_quantity{{$product->id}}').click(function(){
			var num = +$('#quantity{{$product->id}}').val() + 1;
			var price = num * {{$product->price}};
			$('#quantity{{$product->id}}').val(num);
			$('#quantity{{$product->id}}2').val(num);
			$('#display_quantity{{$product->id}}').text(num);
			$('#display_price{{$product->id}}').text(price.toFixed(2));
		});
		$('#remove_quantity{{$product->id}}').click(function(){
			var num = +$('#quantity{{$product->id}}').val() - 1;
			var price = num * {{$product->price}};
			$('#quantity{{$product->id}}').val(num);
			$('#quantity{{$product->id}}2').val(num);
			$('#display_quantity{{$product->id}}').text(num);
			$('#display_price{{$product->id}}').text(price.toFixed(2));
		});
	</script>
	@endforeach
	<script>
		function manuallogin(){
			var form_name = "#" + arguments[0] + "form";
			var product_key = "#" + arguments[0] + "key";
			$(form_name).show();
			$(product_key).hide();
		}
		function validateInfo() {
			var  id = document.forms[arguments[0]]["id"].value;
			if (id == 0) {
				swal(
					'Please choose your ID first',
					'Something went wrong!',
					'info'
					);
				return false;
			}
		}
	</script>
</div>

<!-- User sign in  -->
<div class="row w3-center">
	<a href="/app/sign_in">
		<div class="row">
			<p>Sign in to view your data</p>
		</div>
		<div class="row">
			<img src="/images/key.png" alt="Sign in image" height="30px">

		</div>
	</a>
</div>


@stop
