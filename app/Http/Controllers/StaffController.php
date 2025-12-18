<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        $employees = Employee::where('status', 'active')->get();
        return view('staff.dashboard', compact('employees'));
    }

    public function index()
    {
        $employees = Employee::where('status', 'active')->paginate(12);
        return view('staff.employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('staff.employees.show', compact('employee'));
    }
}
