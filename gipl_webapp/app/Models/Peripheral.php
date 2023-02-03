<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peripheral extends Model
{
    use HasFactory;

    public function incidences() {
        return $this->hasMany(Incidence::class);
    }

    public function computer() {
        return $this->belongsTo(Computer::class);
    }
}
