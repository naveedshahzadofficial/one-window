<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SMEDA One Window') }}</title>
    <meta name="keywords" content="SMEDA One Window" />
    <meta name="description" content="SMEDA One Window" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="page-background">
<!-- background image / main div start -->
<div id="app"></div>

<script type="module" src="{{ asset(mix('js/app.js')) }}"></script>
</body>

</html>
