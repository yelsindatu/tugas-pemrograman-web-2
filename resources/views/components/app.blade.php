<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Rumah Sakit</a>

            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('pasien.index') }}">
                    Pasien
                </a>

                <a class="nav-link" href="{{ route('poli.index') }}">
                    Poli
                </a>

                <a class="nav-link" href="{{ route('dokter.index') }}">
                    dokter
                </a>

                <a class="nav-link" href="{{ route('dokter.trash') }}">
                    Trash
                </a>


            </div>
        </div>
    </nav>

    <div class="bg-primary text-white text-center py-5">
        <h1 class="fw-bold">{{ $title }}</h1>
    </div>

    <div class="container my-5">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
