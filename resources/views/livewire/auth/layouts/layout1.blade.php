<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/js/auth/app.js', 'resources/css/auth/app.css'])
</head>

<body class="bg-admin-light flex items-center justify-center w-full h-screen p-4">
    <div class="bg-white p-8 w-[375px] shadow-lg">
        {{ $slot }}
    </div>
</body>

</html>
