<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('register.store') }}" method="post">
    @csrf
    <input type="text" name="name"><br>
    <input type="email" name="email"><br>
    <input type="password" name="password"><br>
    <input type="password" name="password_confirmation" ><br>
    <button type="submit">Регистрация</button>
</form>
</body>
</html>
