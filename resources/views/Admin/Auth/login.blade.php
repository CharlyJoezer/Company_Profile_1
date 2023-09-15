<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Admin/login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <div class="container_login">
        <div class="box_login">
            <div class="header">
                <img src="/assets/image/logo_web.png" alt="abt solution logo">
            </div>
            @if (session()->has('invalid'))
                <div class="invalid_login">{{ session('invalid') }}</div>
            @endif
            <form class="form_login" action="/admin" method="POST">
                @csrf
                <div class="form_input">
                    <div class="label_input">Username</div>
                    <input class="input_username" type="text" name="username">
                </div>
                <div class="form_input">
                    <div class="label_input">Password</div>
                    <input class="input_password" type="password" name="password">
                </div>
                <button class="confirm_btn">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>