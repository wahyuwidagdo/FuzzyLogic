<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defuzzyfikasi extends Model
{
    protected $guarded = [];

    public function data_fuzzy()
    {
        return $this->belongsTo(DataFuzzy::class);
    }
}
