<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function incidenceHistories() {

        return $this->hasMany(IncidenceHistories::class);
    }

    public function incidences() {

        return $this->hasMany(Incidence::class);
    }
}
