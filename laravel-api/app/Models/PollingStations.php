<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingStations extends Model
{
    use HasFactory;

    public function polling_districts(){
        return $this->belongsTo(PollingDistricts::class);
    }
}
