<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Makhani Intitiute of Technology')</title>
    <meta name="keywords" content="@yield('meta_keywords', 'Makhani Institute, IT Courses, Web Development, Graphic Designing, Mobile Apps, CIT')">
    <meta name="description" content="@yield('meta_description', 'Learn Web Development, Graphic Design, Mobile App Development, and more at Makhani Institute of Technology – Pakistan’s leading IT institute.')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&family=Baloo+Da+2:wght@400..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">


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


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/68662254deea8b190aa35797/1iv7fc6mv';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    <x-footer />


    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true
        });
    </script>

</body>

</html>
