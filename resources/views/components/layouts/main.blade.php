<html>
    <head>
        <title> Control de trafico</title>
        <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
        <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    </head>
        @yield('javascript')
    <body>
        <nav>
            <ul>
                <li><b>Control Aereo</b></li>
                <li  style="float:right"><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
            @yield('content')
    </body>
</html>