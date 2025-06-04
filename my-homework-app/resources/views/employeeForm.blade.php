<html>
    <head>
        <title>Form of employee</title>
        <meta name="csrf-token" content={{csrf_token()}}>
    </head>
    <body>
        <div class="container mt-4">
            <form name="employee-form" id="employee-form" method="post" action="{{url('storeEmployee')}}">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required="true" placeholder="Enter name of Employee">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required="true" placeholder="Enter last name of Employee">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" class="form-control" required="true" placeholder="Enter position of Employee">
                </div>
                <div class="form-group">
                    <label for="email">Last Email</label>
                    <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Enter E-mail">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" id="address" name="address" class="form-control" required="true" placeholder='{"city":"Moscow","street":"Lenina","building":"10"}'></textarea>
                </div>
                <div class="form-group">
                    <label for="workData">Work Data (Json format)</label>
                    <textarea id="workData" name="workData" class="form-control" required="true" placeholder='{"department":"IT","position_level":"senior"}'></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
