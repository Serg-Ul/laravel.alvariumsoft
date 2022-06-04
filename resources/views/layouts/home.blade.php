<!DOCTYPE html>
<html dir="ltr" lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | AlvariumSoft</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}

    <script src="{{ asset('/js/jquery-2.1.1.min.js') }}"></script>
</head>
<body>

{{--Header--}}
@include('partials.header')
{{--Header--}}

{{--Main Part--}}
<div class="wrapper">
    @yield('content')
</div>
{{--Main Part--}}

{{--Footer--}}
@include('partials.footer')
{{--Footer--}}

<script src="{{asset('/js/index.js')}}"></script>
<script src="{{asset('/js/j_index.js')}}"></script>
</body>
</html>

