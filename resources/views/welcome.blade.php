<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
@inject('fieldGenerator', 'App\Services\FieldTypeGenerator')
<h1>feedback</h1>
<div class="container">
    <form class="">
        @foreach($fields as $field)
            {{$fieldGenerator->generate($field)}}
        @endforeach
    </form>
</div>
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>
