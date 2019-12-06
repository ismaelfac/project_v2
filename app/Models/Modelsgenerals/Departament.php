<?php

namespace App\Models\Modelsgenerals;

use App\Models\MethodsBase;
use App\Models\Modelsgenerals \{
    Country, Municipality
};
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use MethodsBase;

    protected $fillable = ['description', 'short_name', 'country_id'];
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
    public function getDepartamentAttribute()
    {
        dd($country);
    }
    public static function factoryDepartament()
    {
        $result = Departament::whereNotIn('id', [0, -1])->where('country_id', 45)->pluck('id')->all();
        $response = self::randomFactory($result);
        return $response;
    }

}
