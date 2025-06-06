<html>
    <form name='test_csrf' method='post' action="{{Route('post_security_form')}}">
        @csrf
        <input type='text' name='test_name'>
        <input type='submit'>
    </form>
</html>
