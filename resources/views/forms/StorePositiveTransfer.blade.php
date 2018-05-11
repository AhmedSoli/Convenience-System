<form method="POST" action="/transfer/add">
    {{ method_field('PATCH')}}
    {{ csrf_field() }}
    <h3 class="w3-tag w3-padding w3-round w3-light-grey">+</h3>
    @if ($page == 'consumer')
    <input required  name="consumer_id" hidden value="{{$consumer->id}}">
    @elseif ($page == 'transfer')
    <div class="form-group">
        <label for="consumer_id">Consumer</label>
        <select name="consumer_id" class="w3-select w3-border">
            @foreach ($consumers as $consumer)
            <option value="{{$consumer->id}}">{{$consumer->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="betrag">Betrag</label>
                <input required class="form-control" id="amount"   name="betrag"> 
            </div>
        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <label for="note">Note</label>
                <input required class="form-control" id="note"  type="text" name="note" value="{{old('note')}}"> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="booking_number">Booking Number</label>
            <input required class="form-control" id="booking_number" type="text" name="booking_number" value="{{old('booking_number')}}"> 
        </div>
    </div>
    <div class="form-group w3-center">
        <button type="submit" name="positive" value="true" class="btn btn-success btn-block">Charge</button>
    </div>
</form>