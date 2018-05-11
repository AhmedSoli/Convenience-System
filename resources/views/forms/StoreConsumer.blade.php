<form  role="form" method="POST" action="/register/consumer">
    {{ csrf_field() }}
    <input hidden name="password" id="pattern" type="password" required>
    <div class="row w3-padding-jumbo">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" required> 
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email"  type="email" name="email" value="{{old('email')}}"> 
        </div>
        <div class="form-group">
            <label for="name">Key FOB</label>
            <input class="form-control"  name="key_id" required> 
        </div>
        <div class="form-group">
            <div class="row w3-center">
                <label for="password" class="control-label">Password</label>
            </div>
            <div class="row">
                <div class="patternContainer" style="background-color:rgba(0,0,0,0);" id="patternContainer"></div>
                <script>
                    var lock = new PatternLock("#patternContainer",{
                        onDraw:function(pattern){
                            $('#pattern').val(lock.getPattern());
                        }
                    });
                </script>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block">
                <i class="fa fa-btn fa-user"></i> Register Consumer
            </button>
        </div>
    </div>
</form>