<div class="panel panel-default w3-center">
    <div class="panel-heading">Orders</div>
    <div class="panel-body" style="overflow-y: scroll; height:200px;">
        @if($page == 'home')
        <div class="row">
            <div class="col-xs-3">
                <p class="w3-label w3-text-grey">Consumer</p>
            </div>
            <div class="col-xs-3">
                <p class="w3-label w3-text-grey">Product</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Cost</p>
            </div>
            <div class="col-xs-1">
                <p class="w3-label w3-text-grey">Quantity</p>
            </div>
            <div class="col-xs-3">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($orders as $order)
        <div class="row w3-border-bottom w3-margin">
            <div class="col-xs-3">
                {{$order->consumer->name}}
            </div>
            <div class="col-xs-3">
                {{$order->product->name}}
            </div>
            <div class="col-xs-2">
                {{$order->cost}}
            </div>
            <div class="col-xs-1">
                {{$order->quantity}}
            </div>
            <div class="col-xs-3" id="order_date{{$order->id}}">
               {{str_limit($order->created_at, $limit = 10, $end = '...')}}
                <script>
                $('#order_date{{$order->id}}').mouseover(function() {
                    $('#order_date{{$order->id}}').html('{{$order->created_at}}')
                })            
                </script>
            </div>
        </div>
        @endforeach 
        @elseif($page == 'consumer')
        <div class="row w3-margin">
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Product</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Cost</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Quantity</p>
            </div>
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($orders as $order)
        <div class="row w3-border-bottom w3-margin">
            <div class="col-xs-4">
                {{$order->product->name}}
            </div>
            <div class="col-xs-2">
                {{$order->cost}}
            </div>
            <div class="col-xs-2">
                {{$order->quantity}}
            </div>
            <div class="col-xs-4" id="order_date{{$order->id}}">
               {{str_limit($order->created_at, $limit = 10, $end = '...')}}
                <script>
                $('#order_date{{$order->id}}').mouseover(function() {
                    $('#order_date{{$order->id}}').html('{{$order->created_at}}')
                })            
                </script>
            </div>
        </div>
        @endforeach
        @elseif($page == 'product')
        <div class="row">
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Consumer</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Cost</p>
            </div>
            <div class="col-xs-2">
                <p class="w3-label w3-text-grey">Quantity</p>
            </div>
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Date</p>
            </div>
        </div>
        @foreach ($orders as $order)
        <div class="row w3-border-bottom w3-margin">
            <div class="col-xs-4">
                {{$order->consumer->name}}
            </div>
            <div class="col-xs-2">
                {{$order->cost}}
            </div>
            <div class="col-xs-2">
                {{$order->quantity}}
            </div>
            <div class="col-xs-4" id="order_date{{$order->id}}">
               {{str_limit($order->created_at, $limit = 10, $end = '...')}}
                <script>
                $('#order_date{{$order->id}}').mouseover(function() {
                    $('#order_date{{$order->id}}').html('{{$order->created_at}}')
                })            
                </script>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="row">
        {{$orders->links()}}
    </div>
</div>
