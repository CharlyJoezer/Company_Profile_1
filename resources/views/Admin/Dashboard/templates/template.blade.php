<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="/css/Admin/dashboard.css" />
        <link rel="stylesheet" href="/css/Admin/sidebar.css" />
        <link rel="stylesheet" href="/css/Admin/navbar.css" />
        <link rel="stylesheet" href="/css/Admin/<?= $css ?>" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <title>{{ $title }}</title>
    </head>
    <body>
        <div class="container_dashboard">
            @include('Admin.Dashboard.templates.components.sidebar')
            <div class="container_content">
                @include('Admin.Dashboard.templates.components.navbar')
                @yield('content')
            </div>
        </div>
    </body>
</html>
