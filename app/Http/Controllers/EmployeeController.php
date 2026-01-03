<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $employees = Employee::with('jabatan')
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();

        return view('employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        $jabatans = Jabatan::with('division')->get();
        return view('employees.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $jabatans = Jabatan::all();
        return view('employees.edit', compact('employee', 'jabatans'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back();
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
}
