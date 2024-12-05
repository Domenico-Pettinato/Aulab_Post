<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- metadati per SEO -->
    <title>{{ $metaTitle ?? 'Impastando.it' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Descrizione di default' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? '' }}">
    <!-- Collegamento di Vite per gli asset principali -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Impastando.it</title>
</head>

<body>
    <x-navbar />
    <main>
        <div class="text-center py-5 mt-5"
            style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://via.placeholder.com/1920x600?text=Impastando.it') no-repeat center; background-size: cover;">
            <!-- <h1 class="display-1 grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-8 mt-5 text-center">Impastando.it</h1> -->

            <!-- Barra di ricerca in stile Edge -->
            <form action="{{ route('article.search') }}" method="GET" class="d-flex justify-content-center my-3" role="search">
                <div class="input-group" style="max-width: 600px; width: 100%; position: relative;">
                    <input
                        type="search"
                        name="query"
                        class="form-control"
                        placeholder="Cerca tra gli articoli..."
                        aria-label="Search"
                        style="height: 45px; font-size: 1.4rem; border-radius: 25px 25px 0 0; padding-left: 35px; border-color: #4285f4;">
                    <!-- Icona della lente, posizionata dentro il campo di input -->
                    <i class="bi bi-search position-absolute" style="left: 10px; top: 43%; transform: translateY(-50%); color: #aaa;"></i>
                </div>
            </form>

            <div class="min-vh-100">
                {{ $slot }}
            </div>
    </main>
    <x-footer />
    </div>
</body>

</html>