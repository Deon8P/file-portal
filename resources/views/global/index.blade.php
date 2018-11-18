@extends('layouts.master')

@section('style')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section('nav')
<div class="topnav" style="position: fixed; top:0%; left: 0; right: 0; z-index: 99;">
        <a href="home"  color="#71b346" >{{ Auth::user()->username }}</a>
        <a href="/chats" >Chats</a>
        <a href="/global" class="active">Global Files</a>
        <a href="/logout" class="float-right">Logout</a>
        </div>
@endsection

@section('content')

<main role="main" style="background: #1e2129">

        @include('global.showGlobal')

</main>

@endsection

@section('scripts')

@endsection

