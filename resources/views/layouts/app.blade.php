<!DOCTYPE html>
<html>
    <head>
        <title> sem nome ainda</title>

        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/nav.css">
        <link rel="stylesheet" href="/styles/form.css">
        <link rel="stylesheet" href="/styles/footer.css">

    </head>
    <body>
        @include('incluir.navbar')
        @yield('content')
        @include('incluir.footer')
    </body>
</html>