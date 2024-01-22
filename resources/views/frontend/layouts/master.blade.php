<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - {{ $app->title }}</title>

    {{-- seo --}}
    <meta name="description" content="{{$app->deskripsi}}">
    <meta name="keywords" content="{{$app->title}}">
    <meta name="language" content="id">
    <meta property="og:title" content="{{$app->title}}">
    <meta property="og:description" content="{{$app->deskripsi}}">
    <meta property="og:image" content="{{asset('theme/img/logo.webp')}}">
    <meta property="og:url" content="/">
    <link rel="shortcut icon" href="{{asset('theme/img/logo.webp')}}" type="image/x-icon">
    {{-- end seo --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/regular.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/fontawesome/css/fontawesome.min.css') }}">



    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastify/src/toastify.css') }}">
</head>

<body class="bg-gray">
    @include('frontend.layouts.navbar')
    @yield('content')

    @include('frontend.layouts.footer')
    <script src="{{ asset('theme/vendor/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/brands.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/regular.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}">
    </script>
</body>

</html>
