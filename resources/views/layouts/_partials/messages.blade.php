@if($message = Session::get('succes'))
<div>
    <p>{{$message}}</p>
</div>
@endif