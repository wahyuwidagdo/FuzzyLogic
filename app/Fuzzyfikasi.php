<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuzzyfikasi extends Model
{
    protected $guarded = [];

    public function data_fuzzy()
    {
        return $this->belongsTo(DataFuzzy::class);
    }
}
