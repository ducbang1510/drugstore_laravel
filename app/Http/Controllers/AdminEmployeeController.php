<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listEmployees()
    {
        $employees = Employee::orderBy('employee_id')->paginate(10);
        return view('admin.employee.list_employees', compact(['employees']));
    }

    public function addEmployeePage()
    {
        return view('admin.employee.add_employee');
    }

    public function addEmployee(Request $request)
    {
        $messages = [
            'name.required' => 'Bạn phải nhập tên nhân viên !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages)->validate();

        $employee_add = Employee::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $employees = Employee::paginate(10);
        return view('admin.employee.list_employees', compact(['employees']));
    }

    public function editEmployeePage($id)
    {
        $employee = Employee::where('employee_id', $id)->first();
        return view('admin.employee.edit_employee', compact(['employee']));
    }

    public function editEmployee($id, Request $request)
    {
        $messages = [
            'name.required' => 'Bạn phải nhập tên nhân viên !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages)->validate();

        $employee_edit = Employee::where('employee_id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $employee = Employee::where('employee_id', $id)->first();
        return view('admin.employee.edit_employee', compact(['employee']));
    }
}
