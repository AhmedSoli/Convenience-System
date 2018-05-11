<div class="panel panel-default w3-center">
    @if($page == 'payments')
    <h3 class="w3-tag w3-padding w3-round w3-light-grey">View Payments</h3>
    <div class="panel-body" style="overflow-y: scroll; height:300px;">
    @else
    <div class="panel-heading w3-center"><a href="/payments">Payments</a></div>
    <div class="panel-body" style="overflow-y: scroll; height:200px;">
    @endif
        @if ($page == 'product')
        <div class="row">
            <div class="col-xs-4">
                <p clasS="w3-label w3-text-grey">Admin</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Note</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Amount</p>
            </div>
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($payments as $payment)
        <div class="row w3-border-bottom w3-padding">
            <div class="col-xs-4">
                {{$payment->user->name}}
            </div>
            <div class="col-xs-2">
                {{$payment->note}}
            </div>
            <div class="col-xs-2">
                {{$payment->amount}}€
            </div>
            <div class="col-xs-4" id="payment_date{{$payment->id}}">
                {{str_limit($payment->created_at,$limit = 10, $end = '...')}}
                <script>
                    $('#payment_date{{$payment->id}}').mouseover(function() {
                        $('#payment_date{{$payment->id}}').html('{{$payment->created_at}}')
                    })            
                </script>
            </div>
        </div>
        @endforeach
        @else 
        <div class="row">
            <div class="col-xs-3">
                <p clasS="w3-label w3-text-grey">Admin</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Name</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Note</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Amount</p>
            </div>
            <div class="col-xs-3">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($payments as $payment)
        <div class="row w3-border-bottom w3-padding">
            <div class="col-xs-3">
                {{$payment->user->name}}
            </div>
            <div class="col-xs-2">
                {{$payment->product->name}}
            </div>

            <div class="col-xs-2">
                {{$payment->note}}
            </div>
            <div class="col-xs-2">
                {{$payment->amount}}€
            </div>
            <div class="col-xs-3" id="payment_date{{$payment->id}}">
                {{str_limit($payment->created_at,$limit = 10, $end = '...')}}
                <script>
                    $('#payment_date{{$payment->id}}').mouseover(function() {
                        $('#payment_date{{$payment->id}}').html('{{$payment->created_at}}')
                    })            
                </script>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="row">
        {{$payments->links()}}
    </div>
</div>  