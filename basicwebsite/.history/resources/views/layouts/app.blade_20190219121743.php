<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acme</title>
    </head>
    <body>
        @yield('content')

        @section('sidebar')
            <div class="sidebar">
                <h3>SideBar</h3>
                This is the sidebar
            </div>
        @endsection
    </body>
</html>