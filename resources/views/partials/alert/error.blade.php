@if(Session::has('error'))
    <div class="alert alert-primary">
        {{Session::get('error')}}
    </div>
@endif