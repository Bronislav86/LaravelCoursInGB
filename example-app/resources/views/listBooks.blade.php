<html>
<head>
    <title>Second Books list</title>
    <meta name="csrf-token" content={{csrf_token()}}>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <table border='2'>
                @foreach($books as $key => $book)
                    <tr><td>{{ $book->book_name }}</td><td>{{ $book->book_author }}</td><td>{{ $book->book_year }}</td><td>{{ $book->book_description }}</td></tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
