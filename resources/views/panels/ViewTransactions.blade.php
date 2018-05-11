@if($page == 'home' || $page == 'transfer')
<div class="panel panel-default w3-center">
    @if($page !== 'home')
    <h3 class="w3-tag w3-padding w3-round w3-light-grey">View Transactions</h3>

    <div class="panel-body" style="overflow-y: scroll; height:300px;">
     @else
    <div class="panel-heading w3-center"><a href="/transfer">Transactions</a></div>
    <div class="panel-body" style="overflow-y: scroll; height:200px;">
       @endif
       <div class="row">
        <div class="col-xs-4">
            <p class="w3-label w3-text-grey">Admin</p>
        </div>
        <div class="col-xs-3">
            <p class="w3-label w3-text-grey">Consumer</p>
        </div>
        <div class="col-xs-2">
            <p class="w3-label w3-text-grey">Amount</p>
        </div>
        <div class="col-xs-3">
            <p class="w3-label w3-text-grey">Date</p>
        </div>
    </div>
    @foreach ($consumers_transactions as $consumers_transaction)
    <div class="row w3-border-bottom w3-padding">
        <div class="col-xs-4">
            {{$consumers_transaction->user->name}}
        </div>
        <div class="col-xs-3">
            {{$consumers_transaction->consumer->name}}
        </div>
        <div class="col-xs-2">
            {{$consumers_transaction->amount}}
        </div>
        <div class="col-xs-3" id="consumers_transaction_date{{$consumers_transaction->id}}">
            {{str_limit($consumers_transaction->created_at, $limit = 10, $end = '...')}}
            <script>
                $('#consumers_transaction_date{{$consumers_transaction->id}}').mouseover(function() {
                    $('#consumers_transaction_date{{$consumers_transaction->id}}').html('{{$consumers_transaction->created_at}}')
                })            
            </script>
        </div>
    </div>
    @endforeach
</div>
@elseif ($page == 'consumer')
<div class="panel panel-default w3-center">
    <div class="panel-heading w3-center"><a href="/transfer">Transactions</a></div>
    <div class="panel-body" style="overflow-y: scroll; height:200px;">
        <div class="row">
            <div class="col-xs-5">
                <p class="w3-label w3-text-grey">Admin</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Amount</p>
            </div>
            <div class="col-xs-5">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($consumers_transactions as $consumers_transaction)
        <div class="row w3-border-bottom w3-padding">
            <div class="col-xs-5">
                {{$consumers_transaction->user->name}}
            </div>
            <div class="col-xs-2">
                {{$consumers_transaction->amount}}
            </div>
            <div class="col-xs-5" id="consumers_transaction_date{{$consumers_transaction->id}}">
                {{str_limit($consumers_transaction->created_at, $limit = 10, $end = '...')}}
                <script>
                    $('#consumers_transaction_date{{$consumers_transaction->id}}').mouseover(function() {
                        $('#consumers_transaction_date{{$consumers_transaction->id}}').html('{{$consumers_transaction->created_at}}')
                    })            
                </script>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <div class="row">
        {{ $consumers_transactions->links() }}
    </div>
</div>