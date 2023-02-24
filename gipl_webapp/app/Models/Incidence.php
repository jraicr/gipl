<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Incidence extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected $revisionFormattedFields = [
        'state_id'      => 'string:%s',
        'student_id'    => 'string:%s',
        'peripheral_id' => 'string:%s',
        'description'   => 'string:%s'
    ];

    protected $revisionFormattedFieldNames = [
        'state_id'      => 'Estado',
        'student_id'    => 'Estudiante',
        'peripheral_id' => 'Periférico',
        'description'   => 'Descripción'
    ];

    //protected $fillable = ['description', 'state_id', 'student_id', 'peripheral_id', 'user_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

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

    public function computer() {
        return $this->hasOneThrough(Computer::class, Peripheral::class, 'id', 'id', 'peripheral_id', 'computer_id');
    }
}
