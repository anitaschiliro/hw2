@extends('layout.accesso')

@section('title', '- Accedi')

@section('script')
<link rel="stylesheet" href="{{url('css/login.css')}}"/> 
<script src='{{ url('js/login.js') }}' defer></script>
@endsection

@section('form')
<div id="logo">Particolari</div>
<form name="login" method="post" action="{{ route('login') }}">
    @csrf
    <h1> Effettua il Login</h1>
    <p>
        <label>Username<input type="text" name="username"></label>
    </p>
    <p>
        <label>Password<input type="password" name="password"></label>
    </p>
    <p>
        <label><input id="accesso" type='submit' value="Accedi"></label>
    </p>
    <p>Non hai un account? <a href="{{ route('signin') }}">Registrati</a></p>
</form>
@endsection