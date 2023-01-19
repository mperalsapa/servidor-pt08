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
    <div class="border-secondary border container col-8 rounded py-3 my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Cognoms</th>
                    <th scope="col">Edat</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Premis</th>
                    <th scope="col">Data de defunció</th>
                    <th scope="col">Raó de defunció</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($athletes as $athlete)
                    <tr>
                        <td>{{ $athlete->name }}</td>
                        <td>{{ $athlete->surname }}</td>
                        <td>{{ $athlete->age() }}</td>
                        <td>{{ $athlete->origin }}</td>
                        <td>{{ $athlete->awards }}</td>
                        <td>{{ $athlete->deathdate() }}</td>
                        <td>{{ $athlete->deathreason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('common.bootstrap-body')
</body>

</html>
