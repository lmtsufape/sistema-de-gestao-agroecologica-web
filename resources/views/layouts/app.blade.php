<!DOCTYPE html>
<html>
    <head>
        <title> sem nome ainda</title>

        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/nav.css">
        <link rel="stylesheet" href="/styles/footer.css">

    </head>
    <body>
        @include('incluir.navbar')
        <div class="main">
        maeeeeeeeeeeee
            @yield('content')
        </div>
        @include('incluir.footer')
    </body>
</html>