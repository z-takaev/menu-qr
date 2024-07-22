<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menu->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('storage/' . $menu->preview) }}" class="img-thumbnail" alt="{{ $menu->preview }}">
                </div>
                <div class="col-6">
                    <h1 class="h2">{{ $menu->name }}</h1>

                    {!! $menu->qrCode() !!}
                </div>
            </div>
        </div>
    </section>
</body>
</html>
