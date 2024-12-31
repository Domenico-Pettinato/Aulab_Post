<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- metadati per SEO -->
    <title>{{ $metaTitle ?? 'Impastando.it' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Panificazione per tutti' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? '' }}">
    <!-- Collegamento di Vite per gli asset principali -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
    <title>Impastando.it</title>
</head>

<body>
    <x-navbar />
    <main>
        <div class="min-vh-100">
            {{ $slot }}
        </div>
    </main>
    <x-footer />
</body>

</html>