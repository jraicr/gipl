<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;
use Venturecraft\Revisionable\Revisionable;

class Peripheral extends Model
{
    use HasFactory;
    use RevisionableTrait;

    protected $revisionFormattedFields = [
        'computer_id'   => 'string:%s',
        'name'          => 'string:%s',
    ];

    protected $revisionFormattedFieldNames = [
        'computer_id'   => 'Ordenador',
        'name'          => 'Nombre',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

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
