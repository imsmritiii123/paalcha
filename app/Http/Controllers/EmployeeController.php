<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // public function showEmployee()
    // {
    //     return view("employee");
    // }

    public function index()
{
    $employees = DB::table('employees')->get();

    return view('employee', ['employees' => $employees]);
}


public function store(Request $request)
{
    $request->validate([
        'emp_name' => 'required',
        'post' => 'required',
        'salary' => 'required',
        'contact' => 'required',
        'address' => 'required'
    ]);

    $employee = new Employee;
    $employee->id = $request->id;
    $employee->emp_name = $request->emp_name;
    $employee->post = $request->post;
    $employee->salary = $request->salary;
    $employee->contact = $request->contact;
    $employee->address = $request->address;
    $employee->save();

    return redirect()->route('employee')->with('success', 'Employee added successfully.');
}


// public function store(Request $req)
// {
//     $employee=new Employee;
//     $employee->id=$req->id;
//     $employee->emp_name=$req->emp_name;
//     $employee->post=$req->post;
//     $employee->salary=$req->salary;
//     $employee->contact=$req->contact;
//     $employee->address=$req->address;
//     $employee->save();
//     return redirect('employee');
//     return redirect()->route('employee.index')->with('success', 'Employee added successfully.');
// }

public function delete($id)
{
    $data=Employee::find($id);
    $data->delete();
    session()->flash('success', 'Employee record deleted successfully!');
    return redirect('employee');
}

public function update(Request $request, $id)
{
    $employee = Employee::find($id);
    $employee->emp_name = $request->input('emp_name');
    $employee->post = $request->input('post');
    $employee->salary = $request->input('salary');
    $employee->contact = $request->input('contact');
    $employee->address = $request->input('address');
    $employee->save();

    return redirect('employee')->with('success', 'Employee updated successfully.');
}


}
