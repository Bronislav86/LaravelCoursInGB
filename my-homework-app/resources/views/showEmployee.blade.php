<html>
    <head>
        <title>Show employee</title>
        <meta name="csrf-token" content={{csrf_token()}}>
    </head>
    <body>
        <div class="container mt-4">
            <h1>Информация о сотруднике</h1>
            <p>ID: {{ $employee->id }}</p>
            <p>Имя: {{ $employee->name }}</p>
            <p>Фамилия: {{ $employee->lastName }}</p>
            <p>Должность: {{ $employee->position }}</p>
            @foreach($employee->address as $key => $value)
                <h3><b>Адрес:<br></b></h3>
                <p><strong>{{ ucfirst($key) . ' ' }}-</strong>{{ ' ' . $value }}</p>
            @endforeach
            <p><h3><b>Дополнительные данные:</h3></b>
                @foreach($employee->workData as $key => $value)
                        <pre><strong>{{ ucfirst($key) . ' ' }}-</strong>{{ ' ' . $value }}</pre>
                @endforeach
            </p>
        </div>
    </body>
</html>
