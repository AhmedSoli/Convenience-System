<div class="panel panel-default">
    <div class="panel-heading w3-center">Consumers</div>
    <div class="panel-body" id="" style="overflow-y: scroll; height:200px;">
        <div class="row">
            <form class="w3-form" method="POST" action="consumers/search">
                {{ csrf_field() }}
                <div class="row w3-center">
                    <button type="submit" class="w3-btn w3-round" style="background-color:rgba(0,0,0,0.5);">Search</button>
                    <input class="awesomplete w3-center w3-input" name="search" list="mylist" id="search" required/>
                    <datalist id="mylist">
                        @foreach ($consumers_list as $consumer)
                        <option>{{$consumer->name}}</option>
                        <option>{{$consumer->key_id}}</option>
                        @endforeach
                    </datalist>
                </div>
            </form>
        </div>
        <div class="row w3-padding">
            @include('app.flash')
        </div>
        <div class="row">
            <div class="col-xs-8">
                <p class="w3-label w3-text-grey">Name</p>
            </div>
            <div class="col-xs-4">
                <p class="w3-label w3-text-grey">Credit</p>
            </div>
        </div>
        @foreach ($consumers as $consumer)
        <div class="row w3-padding w3-border-bottom">
            @if($consumer->active == false)
            <div style="opacity:0.5">
                @endif
                <div class="col-xs-8">
                    <a href="/consumers/{{$consumer->id}}">{{$consumer->name}}</a>
                </div>
                <div class="col-xs-4">
                    <span class="w3-tag w3-round w3-light-grey">{{$consumer->betrag}}€</span>
                </div>
                @if($consumer->active == false)
            </div>
            @endif
        </div>
        @endforeach
        <div class="row w3-center">
            {{ $consumers->links() }}
        </div>
    </div>
</div>