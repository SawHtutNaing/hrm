<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\EmploymentType;
use App\Models\Position;
use App\Models\Staff;
use Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all(); 
        return view('pages.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();
        $employmentTypes = EmploymentType::all();
        $countries = Country::all();
        $cities = City::all();
        return view('pages.staff.create', compact('positions', 'departments', 'employmentTypes', 'countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'employee_id' => 'required|unique:staff,employee_id',
            'date_of_joining' => 'required|date',
            'position_id' => 'required|exists:positions,id',
            'department_id' => 'required|exists:departments,id',
            'profile_picture' => 'nullable|image|max:2048',
        ]);
        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
     
          
                  $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');

        }
        
        Staff::create($data);
     

        return redirect()->route('staffs.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $positions = Position::all();
        $departments = Department::all();
        $employmentTypes = EmploymentType::all();
        $countries = Country::all();
        $cities = City::all();
        return view('pages.staff.edit', compact('staff', 'positions', 'departments', 'employmentTypes', 'countries', 'cities'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'employee_id' => 'required|unique:staff,employee_id,' . $staff->id,
            'date_of_joining' => 'required|date',
            'position_id' => 'required|exists:positions,id',
            'department_id' => 'required|exists:departments,id',
            'profile_picture' => 'nullable|image|max:2048',

            
        ]);

        $data = $request->all();

     



        if ($request->hasFile('profile_picture')) {
            
            if ($staff->profile_picture && Storage::disk('public')->exists($staff->profile_picture)) {
                Storage::disk('public')->delete($staff->profile_picture);
            }
    
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
          
        }
            

        $staff->update($data);

        return redirect()->route('staffs.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully.');
    }

    public function restore($id)
    {
        $staff = Staff::withTrashed()->findOrFail($id);
        $staff->restore();

        return redirect()->route('staffs.index')->with('success', 'Staff restored successfully.');
    }

    
}
