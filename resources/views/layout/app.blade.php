<!DOCTYPE html>
<html>
  <head>
    <title> Particolari @yield('title') </title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script> 
        const BASE_URL="{{url('/')}}";
        const WEATHER_ROUTE="{{route('weather')}}";
        const HOME_ROUTE="{{route('home')}}"
    </script>
    <link rel="stylesheet" href="{{asset('css/base.css')}}"/> 
    <script src='{{ asset('js/base.js') }}' defer></script>
    @yield('script')
  </head>
  <body>
      <header>
        <nav>
        @yield('nav_bar')
        <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
            </div>
        </nav>
      @yield('header')
      </header>

      <section>
      @yield('content')
      </section>
      <footer>
        <p><strong>Particolari's Shop - Clothing and more</strong><br/>
        Anita Schilirò - 1000001476</p>
        <div id="weather"></div>
      </footer>
  </body>
</html>