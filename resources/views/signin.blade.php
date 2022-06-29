@extends('layout.accesso')

@section('title', '- Registrati')

@section('script')
<link rel="stylesheet" href="{{asset('css/signin.css')}}"/> 
<script src='{{ asset('js/signin.js') }}' defer></script>
<script type="text/javascript">
    const SIGNIN_ROUTE = "{{route('signin')}}";
</script>
@endsection

@section('form')
<div id="logo">Particolari</div>
        <form name="signin" method="post" enctype="multipart/form-data" autocomplete="off" action="{{ route('newUser') }}">
            @csrf
                <h1>Registrati</h1>
                <p id="nome">
                    <label>Nome</label>
                    <input type="text" name="nome" value='{{ old('nome') }}'>
                    <span></span>
                </p>
                <p id="cognome">
                    <label>Cognome</label>
                    <input type="text" name="cognome" value='{{ old('cognome') }}'>
                    <span></span>
                </p>
                <p id="email">
                    <label>E-Mail</label>
                    <input type="text" name="email" value='{{ old('email') }}'>
                    <span></span>
                </p>
                <p id="username">
                    <label>Username</label>
                    <input type="text" name="username" value='{{ old('username') }}'>
                    <span></span> 
                </p>
                <p id="password">
                    <label>Password</label>
                    <input type="password" name="password">
                    <span></span>
                </p>
                <p id="conferma">
                    <label>Conferma Password</label>
                    <input type="password" name="confpassword">
                    <span></span>
                </p>
                <p id="consenti"> 
                    <label>
                        <input type='checkbox' name='allow' value="1"{{ (! empty(old('allow')) ? 'checked' : '') }}>
                        <label for='allow'>Acconsento al trattamento dei dati personali</label>
                    </label>
                </p>
                <p id="registrati">
                    <input id="accesso" type='submit' value="Registrati">
                </p>
                <p>
                    Hai già un account?<a href="{{route('login')}}">Accedi</a>
                </p>
         </form>
@endsection