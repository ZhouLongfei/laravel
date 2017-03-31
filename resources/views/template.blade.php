<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale = 1.0, maximum-scale=1.0"/>
    <style>
    	.flash { display:inline-block; position:absolute; bottom: 10px; right:10px; z-index: 100; }
    </style>
    
    <title>hello</title>
</head>
<body>
<h1>hi</h1>
@include('flash')
@yield('main') <!-- Blade command: include section from child file -->
<button onclick="myFunction()">Try it</button>
<script src="/js/pusher/pusher.js"></script>
<script src="/js/jquery/jquery.js"></script>
<script src="/js/handlebars/handlebars.js"></script>

<!--<script src="/js/app.js"></script> -->
<script>
    function myFunction() {
    alert("Hello! I am an alert box!");
}
</script>

</body>
</html>
