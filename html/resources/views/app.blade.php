<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="metro4:init" content="false">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaravelSPA</title>
    <!-- Metro 4 -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <App></App>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
