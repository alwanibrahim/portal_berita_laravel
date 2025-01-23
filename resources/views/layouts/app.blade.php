<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        html,  body {
          
            
            background: linear-gradient(135deg, #f7f9fc, #e2e8f0);
            box-sizing: border-box
            height: 100%;

        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }
        .register-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }
        .bg-responsive {
    background-image: url('/pexels-andreea-ch-371539-1166644.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Media query untuk ukuran layar tertentu */
@media (max-width: 768px) {
    .bg-responsive {
        background-image: url('/pexels-small.jpg'); /* Ganti dengan gambar lebih kecil */
    }
}

@media (max-width: 576px) {
    .bg-responsive {
        background-image: url('/pexels-xs.jpg'); /* Ganti dengan gambar paling kecil */
    }
}

    </style>
</head>
<body>
      

        <main class="py-4">
            @yield('content')
        </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
