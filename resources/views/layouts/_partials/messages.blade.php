@if($message = Session::get('succes'))
<div>
    <p>{{$message}}</p>
</div>
@endif
@if($message = Session::get('danger'))
<div>
    <p>{{$message}}</p>
</div>
@endif