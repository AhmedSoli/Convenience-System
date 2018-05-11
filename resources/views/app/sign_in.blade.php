@extends('layouts.App')

@section('content')
<div class="row">
	<div class="col-xs-1">
		<a href="/app" class="w3-margin-64"><img src="/Images/back.png" alt="Back Button" height="40px">
		</a>
	</div>
	<div class="col-xs-11">
		@include('app.flash')

	</div>


</div>

<div class="col-xs-6">
	<div class="w3-center ">
		<div class="row w3-padding w3-animate-fading">
			<img src="/images/sensor.png" alt="sensor" style="height:30px;" class="w3-spin">
			<p>Detecting key... </p>											
		</div>
		<div class="row w3-padding">
			<form method="POST" action="/app/consumer" name="key_form" id="key_form">
				<div class="form-group">
					<input required autofocus type="password" name="key_id" id="key_id">
				</div>
				{{ csrf_field() }}

			</form>
		</div>
	</div>
</div>
<div class="col-xs-6">
	<form id="form" class="w3-center" method="POST" action="/app/consumer" onsubmit="return validateInfo('form')">
		{{ csrf_field() }}
		<input hidden id="password" name="password">
		<div class="form-group">
			<span class="label label-default">ID:</span>
			<div class="text-center" id="exCurrentSliderValLabel">Current Slider Value: <span id="exSliderVal">0</span></div>
			<input  required id="ex" type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="0" style="width:100%" name="id"/>
			<script>
				$("#ex").slider();
				$("#ex").on("slide", function(slideEvt) {
					$("#exSliderVal").text(slideEvt.value);
				});
			</script>
		</div>
		<div class="form-group">
			<span class="label label-default">Password:</span>
			<div class="patternContainer" style="background-color:rgba(0,0,0,0);" id="patternContainer"></div>
			<script>
				var lock = new PatternLock("#patternContainer",{
					onDraw:function(pattern){
						$('#password').val(lock.getPattern());
						$("#form").submit();
					}
				});
			</script>
		</div>
	</form>

</div>
<script>
	$('#key_id').keyup(function () {
		if (this.value.length == 10) {
			$('#key_form').submit();
		}
	});
</script>


@stop
