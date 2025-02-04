<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CURIEL </title>
    <link rel= "icon" type= "image" href= "images/24.png">
    <link rel= "stylesheet" type= "text/css" href= "resources/css/style_login.css">
</head>
<body> 
    <div class="container">
        <div class="container__form">
            <img src="images/24.png" alt="esto es el Logo">
            <h2>ORESTE</h2>
            <form method="POST">  
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required>
                <input type="password" id="contraseña" name="contraseña" placeholder="Password" required>
                <input class="check" type="checkbox" id="checkid" name="checkid">
                <label for="checkid">Recuerdame</label>

                <a href="#">¿Olvidaste tu contraseña?</a>
                <input class="boton" type="button" value="Iniciar sesión" onclick="login()">                
            </form>            
        </div>
    </div>
    <script src="resources/js/main.js"></script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Ingresar</button>
            <a class="btn btn-secondary w-100" href="{{ route('register') }}">Registrarse</a>
        </form>
        <ul class="navbar-nav">
    
</ul>
    </div>
    
</body>
</html>
