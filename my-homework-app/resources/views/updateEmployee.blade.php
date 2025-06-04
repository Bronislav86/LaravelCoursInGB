<form action="{{ route('employeeEdit', $employee->id) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required="true" value="{{ $employee->name }}">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required="true" value="{{ $employee->lastName }}">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" id="position" name="position" class="form-control" required="true" value="{{ $employee->position }}">
    </div>
    <div class="form-group">
        <label for="email">Last Email</label>
        <input type="email" id="email" name="email" class="form-control" required="true" value="{{ $employee->email }}">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea type="text" id="address" name="address" class="form-control" required="true">{{ json_encode($employee->address, JSON_PRETTY_PRINT) }}</textarea>
    </div>
    <div class="form-group">
        <label for="workData">Work Data (Json format)</label>
        <textarea type='text' id="workData" name="workData" class="form-control" required="true">{{ json_encode($employee->workData, JSON_PRETTY_PRINT) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
