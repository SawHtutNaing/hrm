<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Division;
use App\Models\EmploymentType;
use App\Models\EmploymenType;
use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('first_name'); // First name
            $table->string('last_name'); // Last name
            $table->string('email')->unique(); // Email address
            $table->string('phone')->nullable(); // Phone number
            $table->string('employee_id')->unique(); // Employee ID
            $table->date('date_of_birth')->nullable(); // Date of birth
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender
            $table->string('national_id')->nullable(); // National ID or Social Security Number
            $table->foreignIdFor(Position::class,'position_id');
            $table->foreignIdFor(Department::class,'department_id');
            $table->date('date_of_joining'); 
            $table->decimal('current_salary', 10, 2)->nullable(); 
            $table->foreignIdFor(EmploymentType::class , 'employmen_type_id');
            $table->string('address')->nullable(); // Address
            $table->foreignIdFor(Country::class,'country_id')->nullable(); // Country
            $table->foreignIdFor(City::class,'city_id')->nullable(); 
            
            $table->string('zip_code')->nullable(); 
            $table->string('emergency_contact_name')->nullable(); // Emergency contact name
            $table->string('emergency_contact_phone')->nullable(); // Emergency contact phone
            $table->string('bank_account_number')->nullable(); // Bank account number
            $table->string('bank_name')->nullable(); // Bank name
            
            $table->string('profile_picture')->nullable(); // Profile picture URL or path
          
            $table->enum('status', ['active', 'inactive', 'terminated'])->default('active'); // Employment status

            $table->timestamps(); // Created at and Updated at
            $table->softDeletes(); // Deleted at for soft del
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
};
