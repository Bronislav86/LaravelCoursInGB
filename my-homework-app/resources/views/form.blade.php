<html>
    <head>
        <title>Form test</title>
        <meta name="csrf-token" content={{csrf_token()}}>
    </head>
    <body>
        <div class="container mt-4">
            <form name="reg_form" id="reg_form" method="post" action="/store_form">
                @csrf
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" required="" placeholder="Enter Your Name">
                    <label for="user_last_name">Last Name</label>
                    <input type="text" id="user_last_name" name="user_last_name" class="form-control" required="" placeholder="Enter Your Last Name">
                    <label for="user_email">Last Name</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" required="" placeholder="Enter E-mail">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
