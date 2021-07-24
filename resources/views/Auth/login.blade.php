<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />
    </head>
    <body>
            <div class="login-background"></div>

            <div class="login-container">
                <form method="POST" action="{{ route('auth-login') }}">
                    @csrf
                        <div class="form-header">
                            <h3>Bienvenido</h3>
                        </div>
                        <div class="form-body">
                                <div class="form-input">
                                    <input placeholder="Correo" type="text" id="email" class="formInput" name="email" require>
                                </div>
                                <div class="form-input">
                                    <input placeholder="Password" type="password" class="formInput" id="password" name="password">
                                </div>
                        </div>
                        <div class="form-footer">
                            <button class="btn primary" type="submit">Ingresar</button>
                        </div>
                </form>
            </div>
    </body>
</html>