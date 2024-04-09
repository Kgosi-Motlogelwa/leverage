<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDistricts extends Model
{
    
    protected $fillable = ['code', 'name', 'constituencies_id'];
    
    public function constituencies(){
        return $this->belongsTo(Constituencies::class);
    }

    public function polling_stations(){
        return $this->hasMany(PollingStations::class);
    }
}
