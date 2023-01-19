<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('common.bootstrap-header')
</head>
<body class="">
    @include('common.navbar')
    <div class="border-secondary border container col-3 rounded py-3 my-5">
        <h1>S'ha produit un error.</h1>
        <p> {{ $message }} </p>
        @if(app('request')->input('debug') == "1")
        <p> {{ $ex }} </p>
            
        @endif
    </div>
    @include('common.bootstrap-body')
</body>
</html>