@extends('layouts.master')

@section('style')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section('nav')
<div class="topnav" style="position: fixed; top:0%; left: 0; right: 0; z-index: 99;">
    <a href="home"  color="#71b346" >{{ Auth::user()->username }}</a>
    <a href="/chats" class="active" class="">Chats</a>
    <a href="/global" class="">Global Files</a>
    <a href="/logout" class="float-right">Logout</a>
    </div>

<div class="sidenav" style="position: absoulte; top: 6.9%">
  <h5 style="color: #cc6600">Contacts:</h5>
  <hr noshade style=" height: 2px">

  @if($contacts)

  @if(! $contacts->isEmpty())
<ul>

    @foreach($contacts as $contact)
    @if(Auth::user($contact)->isOnline())
    <li style="color: green">
            <a class="nav-link  mr-1 transition transition-color transition-fade" onclick="chat_ajax('{{ $contact }}')"  style="color: lightgrey; cursor: pointer">{{ $contact }}</a>
    </li>
    @else
    <li style="color: red">
        <a class="nav-link  mr-1 transition transition-color transition-fade" onclick="chat_ajax('{{ $contact }}')"  style="color: lightgrey; cursor: pointer">{{ $contact }}</a>
    </li>
    @endif
    @endforeach

</ul>
    @else
  <h5 class="text-muted" style="color: #cc6600">No contacts yet.</h5>

  @endif
  @endif
</div>
@endsection

@section('content')
@if($contacts->isEmpty())
<div class="floating-div-btn" style="position: absolute;">
    <button type="button" class="floating-button " data-toggle="modal" for="messageModal" data-target="#messageModal" style="color: white; border-radius: 4px; cursor:pointer; position: fixed; top: 50%; right: 40%">Message Someone<i class="material-icons float-right ml-1">message</i></button>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" name="fileUpload">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content" style="background: #1e2129; border-color: #cc6600;">
                <div class="modal-header">
                    <h5 class="modal-title " id="messageModalLabel" style="color: #cc6600;">Send a message</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="/chats/send/message" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                        {{ csrf_field() }}

                        <!-- File upload input-->
                        <div class="form-group">
                            <h1 for="username" class="col-form-label" style="color: #cc6600;">Recipient Username:</h1>
                            <input type="text" id="username" name="username" style="background: #2a2d35; color: #cc6600" required>
                        </div>

                        <hr noshade style="background-color: #cc6600; height: 2px">

                        <!-- File name -->
                        <div class="form-group">
                            <h1 class="col-form-label" for="message" style="color: #cc6600;">Your message:</h1>
                            <textarea type="textarea" class="transition-fade" id="message" name="message" style="width: 70%;" placeholder="Type a message..." required></textarea>
                        </div>

                </div>

                <!-- Footer for upload button and close button-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Send</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endif

<div class="text-center" id="showMessages">

<h1 class="text-muted" style="position: absolute; left: 40%; top: 40%">You have no active chats.</h1>

</div>
@endsection

@section('scripts')

<script>
    function chat_ajax(username){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if(req.readyState == 4 && req.status == 200){
                document.getElementById("showMessages").innerHTML =
                this.responseText;
            }
        }
        req.open('GET', "chats/" + username + "/view", true);
        req.send();

    setInterval(function(){chat_ajax(username)}, 10000);
    }

</script>

@endsection
