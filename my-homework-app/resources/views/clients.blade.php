<html>
    <head>
        <title>Выводим список клиентов</title>
    </head>
    <body>
        <h2>Список клиентов</h2>
        @foreach($clients as $client)
            <li style="list-style-type: none">
            <p>ID: {{$client->id}}</p>
            <p>Name: {{$client->name}}</p>
            <p>Surname: {{$client->surname}}</p>
            <p>E-mail: {{$client->email}}</p>
            <br>
            </li>
        @endforeach
    </body>
</html>
