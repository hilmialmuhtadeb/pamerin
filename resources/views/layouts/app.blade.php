<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset ('/css/font-awesome/css/all.css')}}  ">
    <link rel="stylesheet" href="{{asset ('/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset ('/css/app.css')}} ">
    {{ $style }}

    <title>{{ $title }}</title>
</head>

<body>
    <x-navbar></x-navbar>

    @include('components._alerts')

    <div class="pt-4">
        {{ $slot }}
    </div>

    <x-footer></x-footer>

    <script src="{{asset('/js/app.js') }}"></script>
</body>

</html>
