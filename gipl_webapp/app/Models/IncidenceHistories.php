<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenceHistories extends Model
{
    use HasFactory;

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function incidence() {
        return $this->belongsTo(Incidence::class);
    }

}
