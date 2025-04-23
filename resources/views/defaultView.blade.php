<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","My App")</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/DutyFAV.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield("css")
</head>
    @yield("content")

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield("js")
</html>