@if($message = Session::get('succes'))
<div>
    <p>{{$message}}</p>
</div>
@endif
@if($message = Session::get('danger'))
<div style="background-color: red;" class="container-fluid">
    <p>{{$message}}</p>
</div>
@endif