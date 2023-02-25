<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

class State extends Revisionable
{
    use HasFactory;

    public function incidenceHistories() {

        return $this->hasMany(IncidenceHistories::class);
    }

    public function incidences() {

        return $this->hasMany(Incidence::class);
    }

    public function identifiableName()
    {
        return $this->name;
    }
}
