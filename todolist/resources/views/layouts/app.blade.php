<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Todo List</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('inc.navbar')
        @include('inc.messages')
        <div class="container">
            @yield('content')
        </div>

        <footer id="footer" class="text-center">
            <p>Copyrith &copy; 2017 Kobus Corp</p>
        </footer>
    </body>
</html>