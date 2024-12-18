<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionType extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
