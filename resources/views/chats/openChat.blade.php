

<form action="/chats/send/message" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}

<input type="text" name="username" value="{{ $username }}" hidden>

<div class="floating-div-input">
        <textarea  class="floating-input" rows="5" cols="160" type="textarea" name="message" class="floating-button " style="color: white; border-radius: 4px;" placeholder="Type a message..." required></textarea>
</div>


<div class="floating-div">
    <button type="submit" class="floating-button " style="color: white; border-radius: 4px; cursor:pointer;">Send<i class="material-icons float-right ml-1">send</i></button>
</div>

<form>
<br>
<br>
<br>

<h1 style="color: #cc6600" style="position: fixed; top: 15%; z-index: 99;">{{ $username }}<hr noshade style=" height: 2px; width: 100%; z-index: 99;"></h1>

<div class="text-center" style="position: fixed; left: 10%; right: 0%; top: 18%; bottom: 19%; overflow-y: auto">
@if($messages)
@if(! $messages->isEmpty())
@foreach ($messages as $message)
@if ($message->from_user == Auth::user()->username)

@include('chats.sentMessage')

@else

@include('chats.recievedMessage')

@endif
@endforeach
@endif
@endif
</div>
