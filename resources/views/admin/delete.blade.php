<div class="container">
    <div class="row">
        <div class="col-xs-6">
        <h3 class="w3-center">Delete Consumer</h3>
            <form method="POST" action="/consumers/delete">
                <select class="form-control">
                    @foreach ($consumers as $consumer) 
                    <option class="form-control" value="{{$consumer->id}}">{{$consumer->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-xs-6">

        </div>

    </div>
</div>