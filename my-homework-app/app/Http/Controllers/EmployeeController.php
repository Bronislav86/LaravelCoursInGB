<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function showEmployeeForm()
    {
        return view("employeeForm");
    }

    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->name = $request->input('name');
        $employee->lastName = $request->input('last_name');
        $employee->position = $request->input('position');
        $employee->email = $request->input('email');
        $employee->address = json_decode($request->input('address'), true);
        $employee->workData = json_decode($request->input('workData'), true);

        $employee->save();

        return view('showEmployee', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        return view('updateEmployee', compact('employee'));
    }

    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);

        if($employee){
            $employee->name = $request->input('name');
            $employee->lastName = $request->input('last_name');
            $employee->position = $request->input('position');
            $employee->email = $request->input('email');
        }

        if($request->has('address')){
            $employee->address = json_decode($request->input('address'), true);
        }

        if($request->has('workData')){
            $employee->workData = json_decode($request->input('workData'), true);
        }

        $employee->save();

        return view('showEmployee', ['employee' => $employee]);
    }



//     public function getPath(Request $request)
//     {
//         $path = $request->path();
//
//         echo $path;
//     }
//
//     public function getPath(Request $request)
//         {
//             $url = $request->url();
//
//             echo $url;
//         }
}


