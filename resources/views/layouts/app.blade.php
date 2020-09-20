<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title> sem nome ainda</title>

        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/nav.css">
        <link rel="stylesheet" href="/styles/home.css">
        <link rel="stylesheet" href="/styles/form.css">
        <link rel="stylesheet" href="/styles/footer.css">

    </head>
    <body>
        @include('incluir.navbar')
        <div class="main">
            @yield('content')
        </div>
        
        @include('incluir.footer')
    </body>
</html>