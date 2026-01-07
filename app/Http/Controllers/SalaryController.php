<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    // ADMIN
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        Salary::create([
            'employee_id' => $request->employee_id,
            'gaji_pokok'  => $request->gaji_pokok,
            'tunjangan'   => $request->tunjangan,
            'potongan'    => $request->potongan,
            'total_gaji'  => $request->gaji_pokok + $request->tunjangan - $request->potongan,
            'bulan'       => $request->bulan,
        ]);

        return redirect()->route('salaries.index');
    }

    // STAFF
    public function mySalary()
    {
        $employee = auth::user()->employee;
        $salaries = $employee->salaries;
        return view('salaries.my', compact('salaries'));
    }

    public function my()
    {
        $employee = auth::user()->employee;
        $salaries = $employee->salaries;
        return view('salaries.my', compact('salaries'));
    }
}
