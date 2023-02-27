<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

class Computer extends Revisionable
{
    use HasFactory;

    protected $fillable = ['num', 'classroom_id'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function peripherals() {
        return $this->hasMany(Peripheral::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function incidences() {
        return $this->hasManyThrough(Incidence::class, Peripheral::class);
    }

    public function identifiableName()
    {
        return $this->num;
    }
}
