<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css"> 
    <link rel="stylesheet" href="/css/bootstrap.min.css">   
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/font-awesome.css">  
    <link rel="stylesheet" href="/css/ionicons.css">      
    <link rel="stylesheet" href="/css/AdminLTE.css">       
    <link rel="stylesheet" href="/css/skin-blue.min.css">     
    <link rel="stylesheet" href="/css/skin-purple.min.css">     
    <link rel="stylesheet" href="/css/skin-purple-light.min.css">     
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <title>Document</title>
    
</head>

<body>
    <div id="app">
        <app-rmb></app-rmb>
    </div>    
</body>
<script src="/js/jquery.min.js"></script>            
<script src="/js/app.js"></script>        
<script src="/js/inputmask.bundle.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/AdminLTE.js"></script>


</html>