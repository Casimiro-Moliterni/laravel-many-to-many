<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <main class="d-flex align-items-center justify-content-center w-100" style="height: 100vh">
        <div>
            <h1 class="text-danger text-center ">Errore 404</h1>
            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-lg btn-success">
                    <a href="{{ url('/') }}" class="text-white">Home</a>
                </button>
                <button class="btn btn-lg btn-success">
                    <a href="{{ route('admin.dashboard') }}" class="text-white">dashboard</a>
                </button>
            </div>
        </div>
    </main>
</body>

</html>
