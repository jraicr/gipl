<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

class Peripheral extends Revisionable
{
    use HasFactory;

    public function incidences() {
        return $this->hasMany(Incidence::class);
    }

    public function computer() {
        return $this->belongsTo(Computer::class);
    }

    public function identifiableName()
    {
        return $this->name;
    }
}
