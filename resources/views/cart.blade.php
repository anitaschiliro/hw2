@extends('layout.app')

@section('title','- Il tuo carrello')

@section('script')
<link rel="stylesheet" href="{{asset('css/carrello.css')}}"/> 
<script src='{{ asset('js/carrello.js') }}' defer></script>
@endsection

@section('nav_bar')
<div id="logo">Particolari - Clothing shop</div>
            <div id="link">
                <a href="{{ route('home') }}">Home</a>
                <a id="shop" href="{{route('shop')}}">Shop Online</a>
                <a id='user' href="{{route('profile')}}"><img src='css/immagini/user.png'>
                {{$user['username']}} </a>
                <a id='logout' href="{{route('logout')}}">Logout</a>
            </div>
            <div class="hidden" id="menu_ext">
                <a href="{{ route('home') }}">Home</a>
                <a id="shop" href="{{route('shop')}}">Shop Online</a>
                <a id='user' href="{{route('profile')}}"><img src='css/immagini/user.png'>
                {{$user['username']}} </a>
                <a id='logout' href="{{route('logout')}}">Logout</a>
            </div>
@endsection

@section('header')
        <img src='css/immagini/user.png'>
        <h1>{{$user['nome']}} {{$user['cognome']}}</h1>
        <p> {{$user['username']}}</p>
@endsection

@section('content')


@endsection