<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    use HasFactory;

    // Relación uno a muchos inversa  de la tabla estados
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // Relación uno a muchos inversa de la tabla estudiantes
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relación uno a muchos inversa de la tabla periféricos
     */
    public function peripheral()
    {
        return $this->belongsTo(Peripheral::class);
    }

    /**
     * Relación uno a muchos inversa de la tabla usuarios
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación uno a muchos
     */
    public function incidenceHistories()
    {
        return $this->hasMany(IncidenceHistories::class);
    }
}
