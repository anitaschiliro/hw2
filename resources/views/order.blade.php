@extends('layout.app')

@section('title','- Ordina ora')

@section('script')
<link rel="stylesheet" href="{{asset('css/ordine.css')}}"/> 
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
<h1>Compila i campi per procedere all'ordine</h1>
          <form name="ordine" method="post" action="{{route('orderNow')}}">
            @csrf
            <p>Inserisci indirizzo di spedizione</p>
            <p>
              <label>Via <input type="text" name="via"></label>
            </p>
            <p>
              <label>Numero<input type=text name="numciv"></label>
            </p>
            <p>
              <label>Città<input type="text" name="citta"></label>
            </p>
            <p>
              <label> CAP<input type="text" name="cap"></label>
            </p>
            <p>
              <input type="submit" name="ordina" value="Ordina ora">
            </p>
            </form>
@endsection