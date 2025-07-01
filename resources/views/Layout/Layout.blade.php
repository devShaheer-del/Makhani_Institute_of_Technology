<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Makhani Intitiute of Technology')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&family=Baloo+Da+2:wght@400..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>
<style>
    * {
        font-family: "Baloo Da 2", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;

    }
</style>

<body>
    <x-header />


    <main style="width: auto; height:auto;">
        @yield('content')
    </main>


    <x-footer />
</body>

</html>
