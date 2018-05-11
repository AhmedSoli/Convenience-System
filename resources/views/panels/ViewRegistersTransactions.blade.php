<div class="panel panel-default">
	<h3 class="w3-tag w3-padding w3-round w3-light-grey">View Transactions</h3>

	<div class="panel-body" style="overflow-y: scroll; height:300px;">
		<div class="row">
			<div class="col-xs-3">
				<p class="w3-label w3-text-grey">Sender</p>
			</div>
			<div class="col-xs-3">
				<p class="w3-label w3-text-grey">Reciever</p>
			</div>
			<div class="col-xs-2">
				<p class="w3-label w3-text-grey">Note</p>
			</div>
			<div class="col-xs-1">
				<p class="w3-label w3-text-grey">Amount</p>
			</div> 
			<div class="col-xs-3">
				<p class="w3-label w3-text-grey">Date</p>
			</div>
		</div>
		@foreach ($registers_transactions as $registers_transaction)
		<div class="row w3-border-bottom">
			<div class="col-xs-3">
				{{$registers_transaction->sender->name}}
			</div> 
			<div class="col-xs-3">
				{{$registers_transaction->reciever->name}}
			</div> 
			<div class="col-xs-2">
				{{$registers_transaction->note}}
			</div>
			<div class="col-xs-1">
				{{$registers_transaction->amount}}
			</div> 
			<div class="col-xs-3">
			</div>
			<div class="col-xs-3" id="registers_transaction_date{{$registers_transaction->id}}">
				{{str_limit($registers_transaction->created_at, $limit = 10, $end = '...')}}
				<script>
					$('#registers_transaction_date{{$registers_transaction->id}}').mouseover(function() {
						$('#registers_transaction_date{{$registers_transaction->id}}').html('{{$registers_transaction->created_at}}')
					})            
				</script>
			</div>
		</div>
		@endforeach
	</div>
	<div class="row">
		{{$registers_transactions->links()}}
	</div>
</div>