<form role="form" method="POST" action="/register/admin">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" required> 
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" required> 
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" required> 
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default btn-block">
            <i class="fa fa-btn fa-user"></i> Register Admin
        </button>
    </div>
</form>