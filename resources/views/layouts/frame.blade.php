<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- uikit --}}
        <link rel="stylesheet" href="/css/uikit.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/uikit.min.js"></script>
        <script src="/js/uikit-icons.min.js"></script>
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        @yield('body')
    </body>
</html>