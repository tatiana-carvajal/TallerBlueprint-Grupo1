<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
</head>

<body class="bg-primary bg-gradient d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg border-0 rounded-3" style="width: 400px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                <h2 class="fw-bold text-primary">Bienvenido</h2>
                <p class="text-muted">Ingresa a tu cuenta</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="user" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-secondary fw-bold">Correo electrónico</label>
                    <input type="email" name="email" id="email"
                        class="form-control form-control-lg border-primary"
                        placeholder="ejemplo@correo.com"
                        value="{{ old('email') }}" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label text-secondary fw-bold">Contraseña</label>
                    <input type="password" name="password" id="password"
                        class="form-control form-control-lg border-primary"
                        placeholder="contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                    <i class="fas fa-sign-in-alt me-2"></i>Ingresar
                </button>
            </form>
        </div>
    </div>

</body>
</html>