<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title', 'Blogen') </title>
    <link rel="shortcut icon" href=" {{ asset('frontend/images/favicon.png') }} " type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/tailwind.css') }}" />
    <!-- custom css  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false" @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false" class="a0 dark:a1">

    @include('website.layouts.header')


    @yield('frontend_content')
</body>

</html>
