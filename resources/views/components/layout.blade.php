<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BariPost</title>
</head>

<body>
    <x-navbar />
    <main>
        <h1 class="display-1 grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-8 mt-5 text-center">Ssc Bari Post</h1>
        <div class="min-vh-100">
            {{ $slot }}
        </div>
    </main>
    <x-footer/>
</body>

</html>