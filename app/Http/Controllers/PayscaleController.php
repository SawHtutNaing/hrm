<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayscaleRequest;
use App\Http\Requests\UpdatePayscaleRequest;
use App\Models\Payscale;

class PayscaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payscales = PayScale::all();
        return view('pages.payscales.index', compact('payscales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.payscales.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayscaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayscaleRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        PayScale::create($request->all());
        return redirect()->route('payscales.index')->with('success', 'PayScale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payscale  $payscale
     * @return \Illuminate\Http\Response
     */
    public function show(Payscale $payscale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payscale  $payscale
     * @return \Illuminate\Http\Response
     */
    public function edit(Payscale $payscale)
    {
        return view('pages.payscales.edit', compact('payscale'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayscaleRequest  $request
     * @param  \App\Models\Payscale  $payscale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayscaleRequest $request, Payscale $payscale)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $payscale->update($request->all());
        return redirect()->route('payscales.index')->with('success', 'PayScale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payscale  $payscale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payscale $payscale)
    {
        $payscale->delete();
        return redirect()->route('payscales.index')->with('success', 'PayScale deleted successfully.');
    }
}
