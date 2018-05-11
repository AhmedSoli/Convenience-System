<form method="POST" action="/consumers/{{$consumer->id}}/update">
    {{method_field('PATCH')}}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input required class="form-control" id="name" type="text" name="name" value="{{$consumer->name}}"> 
    </div>
    <div class="form-group">
        <label for="key_id">Key ID:</label>
        <input required class="form-control" id="key_id"  type="text" name="key_id" value="{{$consumer->key_id}}"> 
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" value="{{$consumer->email}}"> 
    </div>
    <div class="form-group">
        <label for="pfand">Pfand bezahlt:</label>
        <select name="pfand" class="form-control">
            <option value ="none"></option>
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>