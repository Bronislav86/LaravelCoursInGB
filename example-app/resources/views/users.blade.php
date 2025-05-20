<html>
<body>
    @php
    $greenUser = 2;
    @endphp
<table border="3px">
    @foreach($users as $key=>$user)
        @if($key === $greenUser)
            <tr><td>{{ $key+1 }}</td><td style="background-color: green">{{ $user }}</td></tr>
        @elseif ($key === 4)
            <tr><td>{{ $key+1 }}</td><td><b>{{ $user }}</b></td></tr>
        @else
            <tr><td>{{ $key+1 }}</td><td>{{ $user }}</td></tr>
        @endif
    @endforeach

</body>
</html>
