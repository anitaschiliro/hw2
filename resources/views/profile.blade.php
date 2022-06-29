@extends('layout.app')

@section('title','- Il tuo profilo')

@section('script')
<link rel="stylesheet" href="{{asset('css/profilo.css')}}"/> 
<script src='{{ asset('js/profilo.js') }}' defer></script>
@endsection

@section('nav_bar')
<div id="logo">Particolari - Clothing shop</div>
            <div id="link">
                <a href="{{ route('home') }}">Home</a>
                <a id="shop" href="{{route('shop')}}">Shop Online</a>
                <a id='carrello' href="{{route('cart')}}">Carrello</a>
                <a id='logout' href="{{route('logout')}}">Logout</a>
            </div>
            <div class="hidden" id="menu_ext">
                <a href="{{ route('home') }}">Home</a>
                <a id="shop" href="{{route('shop')}}">Shop Online</a>
                <a id='carrello' href="{{route('cart')}}">Carrello</a>
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