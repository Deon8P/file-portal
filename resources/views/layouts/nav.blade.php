@section('nav')
<div class="topnav" style="position: absolute; top:0%; left: 0; right: 0;">
    <a href="home" class="active" color="#71b346" >{{ Auth::user()->username }}</a>
    <a href="/chats" class="">Chats</a>
    <a href="/global" class="">Global Files</a>
    <a href="/logout" class="float-right">Logout</a>
</div>
@endsection
