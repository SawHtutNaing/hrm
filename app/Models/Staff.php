<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Staff extends Model
{
    use HasFactory, SoftDeletes;


    use HasFactory, SoftDeletes;

    // The table associated with the model
    

    // Fillable attributes for mass assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'employee_id',
        'date_of_birth',
        'gender',
        'national_id',
        'position_id',
        'department_id',
        'date_of_joining',
        'current_salary',
        'employmen_type_id',
        'address',
        'country_id',
        'city_id',
        'zip_code',
        'emergency_contact_name',
        'emergency_contact_phone',
        'bank_account_number',
        'bank_name',
        'profile_picture',
        'status',
    ];

    // Relationships
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employmentType()
    {
        return $this->belongsTo(EmploymentType::class, 'employmen_type_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }



}
