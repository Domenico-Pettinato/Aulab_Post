<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BariPost</title>
</head>

<body>
    <x-navbar/>
    <main>
        <div class="min-vh-100">
            {{ $slot }}
        </div>
    </main>
    <x-footer />
</body>

</html>