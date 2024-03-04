<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
@include('layout.header.header')
<main>
    @yield('content')
</main>
@include('layout.footer.footer')
@include('blocks.modals.modals')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=df3baf12-3c61-4eb6-9e5f-1bbee194c78d"
        type="text/javascript"></script>
<script src="/library/jquery-3.6.0.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
