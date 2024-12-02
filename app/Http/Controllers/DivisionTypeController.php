<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionTypeRequest;
use App\Http\Requests\UpdateDivisionTypeRequest;
use App\Models\DivisionType;

class DivisionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisionTypes = DivisionType::all();
        return view('pages.division_types.index', compact('divisionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.division_types.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisionTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisionTypeRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DivisionType::create($request->all());
        return redirect()->route('division_types.index')->with('success', 'Division Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DivisionType  $divisionType
     * @return \Illuminate\Http\Response
     */
    public function show(DivisionType $divisionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DivisionType  $divisionType
     * @return \Illuminate\Http\Response
     */
    public function edit(DivisionType $divisionType)
    {
        return view('pages.division_types.edit', compact('divisionType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisionTypeRequest  $request
     * @param  \App\Models\DivisionType  $divisionType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDivisionTypeRequest $request, DivisionType $divisionType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $divisionType->update($request->all());
        return redirect()->route('division_types.index')->with('success', 'Division Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DivisionType  $divisionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DivisionType $divisionType)
    {
        $divisionType->delete();
        
        
        return redirect()->route('division_types.index')->with('success', 'Division Type deleted successfully.');
    }
}
