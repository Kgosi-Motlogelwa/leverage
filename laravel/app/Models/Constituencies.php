<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituencies extends Model
{
    // use HasFactory;
    protected $fillable = ['code', 'name'];
    public function polling_districts(){
        return $this->hasMany(PollingDistricts::class);
    }
}
