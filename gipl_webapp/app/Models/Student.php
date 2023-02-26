<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

class Student extends Revisionable
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function incidences() {

        return $this->hasMany(Incidence::class);
    }

    public function scholarGroup() {

        return $this->belongsTo(ScholarGroup::class);
    }

    public function computer() {

        return $this->belongsTo(Computer::class);
    }

    public function identifiableName()
    {
        return $this->name;
    }
}
