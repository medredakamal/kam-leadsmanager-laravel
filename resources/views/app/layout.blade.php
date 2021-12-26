<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Loading js files before, because we have an ajax script blade file that will load before them --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <title>Leads Management - Med Reda Kamal</title>
</head>


<body>
    <div class="kamleads-app">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>

</html>
