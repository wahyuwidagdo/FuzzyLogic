<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFuzzy extends Model
{
    protected $guarded = [];
    
    public function fuzzyfikasi()
    {
        return $this->hasOne(Fuzzyfikasi::class);
    }

    public function inferensi()
    {
        return $this->hasOne(Inferensi::class);
    }

    public function defuzzyfikasi()
    {
        return $this->hasOne(Defuzzyfikasi::class);
    }
}
