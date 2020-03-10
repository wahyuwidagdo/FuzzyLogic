<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inferensi extends Model
{
    protected $guraded = [];

    public function data_fuzzy()
    {
        return $this->belongsTo(DataFuzzy::class);
    }
}
