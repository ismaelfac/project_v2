<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Model;

class Civilstatus extends Model
{
    //
    protected $fillable = ['description'];
    public $timestamps = false;

    public function members () 
    {
        return $this->belongsTo(Member::class);
    }
}