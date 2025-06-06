<html>
<head>
    <title>My test form</title>
    <meta name="csrf-token" content={{csrf_token()}}>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form name="myname" id="add-blog-post-form" method="post" action="{{Route('post_form')}}">
                    @csrf
                    <div class="form-group">
                        <label for="my_name">Name: </label>
                        <input type="text" id="my_name" name="my_name" class="form-control" required="">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" class="form-control">
                        <label for="age">Age: </label>
                        <input type="hidden" name="age"id="age" class="form-control" value='35'><br>
                        <label>Male</label><input type='radio' name='gender' value='male' checked>
                        <label>Female</label><input type='radio' name='gender' value='female'>
                        <br>
                        <label>Notebooks</label><input type='checkbox' name='category[]' value='notebooks'>
                        <label>Monitors</label><input type='checkbox' name='category[]' value='monitors'>
                        <label>Printers</label><input type='checkbox' name='category[]' value='printers'>
                        <br>

                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
