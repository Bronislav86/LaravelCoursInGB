<html>
<head>
    <style>
        .invalid {color : red}
    </style>
</head>
<body>
    <form name='validation_test' method='post' action="{{Route('post_validation_form')}}">
        @csrf
        <label @error("fullname") class='invalid' @enderror>Name <b>@error("fullname"){{ $message }}</b> @enderror</label>
        <input type='text' name='fullname' required>
        <br>
        <label @error("password") class='invalid' @enderror>Password</label>
        <input type='password' name='password'>
        <br>
        <label>Confirm password</label>
        <input type='password' name='confirm_password'>
        <br>
        <input type='submit' value='Send'>
    </form>
@foreach($errors->all() as $error)
    {{ $error }} <br>
@endforeach
</body>
</html>
