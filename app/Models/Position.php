<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'payscale_id'];

    public function payscale()
    {
        return $this->belongsTo(Payscale::class, 'payscale_id');
    }
}
