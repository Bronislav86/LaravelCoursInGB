<html>
    <head>
        <meta charset="utf-8">
        <title>Выводим список клиентов</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
            }
        </style>
    </head>
    <body>
        <h2>Список клиентов</h2>
        @if($clients)
        @foreach($clients as $client)
            <li style="list-style-type: none">
                <p>ID: {{$client->id}}</p>
                <p>Name: {{$client->name}}</p>
                <p>Surname: {{$client->surname}}</p>
                <p>E-mail: {{$client->email}}</p>
                <br>
            </li>
        @endforeach
        @else
            <li style="list-style-type: none">
                <p>ID: {{$id}}</p>
                <p>Name: {{$name}}</p>
                <p>Surname: {{$surname}}</p>
                <p>E-mail: {{$email}}</p>
                <br>
            </li>
        @endif
    </body>
</html>
