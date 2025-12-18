<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('jabatan')->paginate(5);
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('admin.employees.create', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        Employee::create($request->all());

        return redirect('/admin/employees')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $jabatans = Jabatan::all();
        return view('admin.employees.edit', compact('employee','jabatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required'
        ]);

        $employee->update($request->all());

        return redirect('/admin/employees')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
