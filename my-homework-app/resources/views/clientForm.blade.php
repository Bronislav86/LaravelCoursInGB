<html>
    <head>
        <title>Form of Client</title>
        <meta name="csrf-token" content={{csrf_token()}}>
    </head>
    <body>
        <div class="container mt-4">
            <form name="client-form" id="client-form" method="post" action="{{Route('store_client')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required="true" value="@if($client){{$client->name}}@endif">
                </div>
                <div class="form-group">
                    <label for="surname">Last Name</label>
                    <input type="text" id="surname" name="surname" class="form-control" required="true" value="@if($client){{$client->surname}}@endif">
                </div>
                <div class="form-group">
                    <label for="email">Last Email</label>
                    <input type="email" id="email" name="email" class="form-control" required="true" value="@if($client){{$client->email}}@endif">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </div>
    </body>
</html>
