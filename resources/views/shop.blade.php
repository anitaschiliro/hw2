@extends('layout.app')

@section('title','- Shop online')

@section('script')
<link rel="stylesheet" href="{{asset('css/shop.css')}}"/> 
<script src='{{ asset('js/shop.js') }}' defer></script>
@endsection

@section('nav_bar')
<div id="logo">Particolari - Clothing shop</div>
    <div id="link">
        <a href="{{ route('home') }}">Home</a>
        @if(session('userid')==NULL)
            <a id='login' href="{{route('login')}}">Login</a>
        @else
            <a id='user' href="{{route('profile')}}"><img src='css/immagini/user.png'>
            {{$user['username']}} </a>
            <a id='carrello' href="{{route('cart')}}">Carrello</a>
            <a id='logout' href="{{route('logout')}}">Logout</a>
        @endif
    </div>
    <div class="hidden" id="menu_ext">
        @if(session('userid')==NULL)
            <a id='login' href="{{route('login')}}">Login</a>
        @else
            <a id='user' href="{{route('profile')}}"><img src='css/immagini/user.png'>
            {{$user['username']}} </a>
            <a id='carrello' href="{{route('cart')}}">Carrello</a>
            <a id='logout' href="{{route('logout')}}">Logout</a>
        @endif
    </div>
@endsection

@section('header')
    <h1><strong>Shop Online</strong><br/>
        <em>Spedizioni in tutta Italia in 48 ore!</em><br/>
    </h1>
    <form method="get" name="search">
        <label>
            <input type="text" id="testo" name="ricerca" >
            <input type="submit" value="Cerca">
        </label>
    </form>
@endsection

@section('content')


@endsection