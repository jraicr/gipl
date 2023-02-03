<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function peripherals() {
        return $this->hasMany(Peripheral::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
