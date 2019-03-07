@extends('layouts.app')
<body class="skin-purple-light layout-top-nav" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

<header class="main-header">
    @include('inc.navbar')
</header>
<!-- Full Width Column -->
<div class="content-wrapper" style="min-height: 841px;">
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        @yield('header')
        <small>@yield('headerDescription')</small>
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content" id="app">

        @yield('content')
    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright © 2019 <a href="https://adminlte.io">NeuraStream</a>.</strong> All rights
    reserved.
    </div>
    <!-- /.container -->
</footer>
</div>
</body>
