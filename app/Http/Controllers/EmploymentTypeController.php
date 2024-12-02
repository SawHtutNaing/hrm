<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmploymenTypeRequest;
use App\Http\Requests\UpdateEmploymenTypeRequest;
use App\Models\EmploymentType;

class EmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employmentTypes = EmploymentType::all();
        return view('pages.employment_types.index', compact('employmentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employment_types.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmploymenTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmploymenTypeRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EmploymentType::create($request->all());
        return redirect()->route('employment_types.index')->with('success', 'Employment Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymenType  $employmenType
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentType $employmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymenType  $employmenType
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentType $employmentType)
    {
        return view('pages.employment_types.edit', compact('employmentType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmploymenTypeRequest  $request
     * @param  \App\Models\EmploymenType  $employmenType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmploymenTypeRequest $request, EmploymentType $employmentType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $employmentType->update($request->all());
        return redirect()->route('employment_types.index')->with('success', 'Employment Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymenType  $employmenType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentType $employmentType)
    {
        $employmentType->delete();
        return redirect()->route('employment_types.index')->with('success', 'Employment Type deleted successfully.');
    }
}
