<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Models\Division;
use App\Models\DivisionType;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $divisions = Division::all();
    return view('pages.divisions.index', compact('divisions'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisionTypes = DivisionType::all();
        return view('pages.divisions.create', compact('divisionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisionRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division_type_id' => 'required|exists:division_types,id',
        ]);

        Division::create($request->all());
        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        $divisionTypes = DivisionType::all();
        return view('pages.divisions.edit', compact('division', 'divisionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisionRequest  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division_type_id' => 'required|exists:division_types,id',
        ]);

        $division->update($request->all());
        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}
