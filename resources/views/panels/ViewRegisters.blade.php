<div class="panel panel-default">
    <div class="panel-heading w3-center">Registers</div>
    <div class="panel-body" id="" style="overflow-y: scroll; height:200px;">
        <div class="row">
            <div class="col-xs-8">
                <p class="w3-label w3-text-grey">Name</p>
            </div>
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Credit</p>
            </div>
        </div>
        @foreach ($users as $user)
        <div class="row w3-padding w3-border-bottom">
            <div class="col-xs-8">
                {{$user->name}}
            </div>
            <div class="col-xs-4">
                <span class="w3-tag w3-round w3-light-grey">{{$user->betrag}}€</span>
            </div>
        </div>
        @endforeach
    </div>
</div>