<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Template</title>
</head>
<body>
{{ "Hello World" }}
{{ "<h1>Hello World</h1>" }}
{!! "<h1>Hello World</h1>" !!}

{{"<script>alert('Hello World')</script>"}}
{!! "<script>alert('Hello World')</script>" !!}
@php
$isAdmin=true;
$fruits=['apple', 'banana', 'orange', 'pineapple'];
@endphp
@if ($isAdmin)
    <p>Welcome, Admin!</p>
@else
    <p>Welcome, Guest!</p>
@endif

@foreach($fruits as $fruit)
    <p>{{$fruit}}</p>
@endforeach
</body>
</html>
