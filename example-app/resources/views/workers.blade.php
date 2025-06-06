<html>
<body>
    <form name='worker' method='post' action="{{Route('store_worker')}}">
        @csrf
        <label>First Name</label>
        <input type='text' name='first_name' value='@if($worker) {{$worker->first_name}} @endif'>
        <br>
        <label>Last Name</label>
        <input type='text' name='last_name' value='@if($worker) {{$worker->last_name}} @endif'>
        <br>
        <label>Department</label>
            <input type='checkbox' name='department[]' value='finance' @if($worker && in_array('finance', unserialize($worker->department))) checked @endif>Finance</input>
            <input type='checkbox' name='department[]' value='logistics' @if($worker && in_array('logistics', unserialize($worker->department))) checked @endif>Logistics</input>
            <input type='checkbox' name='department[]' value='it' @if($worker && in_array('it', unserialize($worker->department))) checked @endif>IT</input>
            <input type='checkbox' name='department[]' value='internal service' @if($worker && in_array('internal service', unserialize($worker->department))) checked @endif>Internal service</input>
        <br>
        <input type='submit' value='Send'>
    </form>
</body>
</html>
