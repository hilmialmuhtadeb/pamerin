<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset ('/css/font-awesome/css/all.css')}}  ">
    <link rel="stylesheet" href="{{asset ('/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset ('/css/app.css')}} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
