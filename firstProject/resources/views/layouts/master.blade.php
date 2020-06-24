<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="{{asset('css/app.css')}}">    <!-- assets used for acess public folder like ( css )-->
    <title>{{env('APP_NAME','Mahmoud Arafa')}}</title>
</head>
<body>
    @include('includs.navbar')
    <div class="mb-4"></div>
    <div class="container">
        @include('includs.message')
        <p>@yield('content')</p>
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>