<?php

namespace App\Models\Modelsgenerals;

use Illuminate\Database\Eloquent\Model;
use App\Models\Modelsgenerals \{
    Departament
};
use App\Models\Customer;

class Country extends Model
{
    //
    protected $fillable = ['code', 'description', 'nationality', 'short_name'];

    public $timestamps = false;
    
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function departaments()
    {
        return $this->hasMany(Departament::class);
    }
}