@if (session()->has('flash_message'))
    <div class="alert alert-{{session('flash_level')}}" id="flash_message">{{session('flash_message')}}
    </div>
    <script>
    setTimeout(function(){ $('#flash_message').hide();}, 3000);
    </script>
@endif
