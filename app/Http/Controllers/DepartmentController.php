<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeptartmentRequest;
use App\Http\Requests\UpdateDeptartmentRequest;
use App\Models\Department;
use App\Models\Deptartment;
use App\Models\Division;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('division')->get();
        return view('pages.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('pages.departments.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeptartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeptartmentRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division_id' => 'required|exists:divisions,id',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deptartment  $deptartment
     * @return \Illuminate\Http\Response
     */
    public function show(Department $deptartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deptartment  $deptartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $divisions = Division::all();
        return view('pages.departments.edit', compact('department', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeptartmentRequest  $request
     * @param  \App\Models\Deptartment  $deptartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeptartmentRequest $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division_id' => 'required|exists:divisions,id',
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deptartment  $deptartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
