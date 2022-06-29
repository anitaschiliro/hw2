@extends('layout.app')

@section('script')
<script src='{{ asset('js/home.js') }}' defer></script>
@endsection

@section('title','- Home')

@section('nav_bar')
<div id="logo">Particolari - Clothing shop</div>
    <div id="link">
        <a href="{{ route('home') }}">Home</a>
        <a id="shop" href="{{route('shop')}}">Shop Online</a>
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
        <a id="shop" href="{{route('shop')}}">Shop Online</a>
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
<h1><strong>
            @if(session('userid')!=NULL)
                Benvenuto, {{$user['username']}}!
            @else
                La moda a casa tua!
            @endif
        </strong></br>
          <em>Scopri l'abbigliamento adatto al tuo bambino.</em><br/>
          <a class="button" href="{{route('shop')}}">Scopri di più</a>

        </h1>
@endsection

@section('content')
<div id="main">
    <h1>Tutto di cui hai bisogno lo trovi da noi.</h1>
    <p >
      10 anni di esperienza nel settore dell'abbigliamento. <br>
      Marchi 100% designed and made in Italy.
    </p>
</div>
<div id="dettagli">

</div>
@endsection