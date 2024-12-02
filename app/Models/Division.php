<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'division_type_id'];
    public function divisionType()    {
        return $this->belongsTo(DivisionType::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

}
