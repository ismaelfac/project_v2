<?php

namespace App\Models\Modelsgenerals;

use App\Models\MethodsBase;
use App\Models\Modelsgenerals \{
    Neighborhood, Municipality
};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Location extends Model
{
    use MethodsBase;

    protected $fillable = ['description', 'short_name', 'municipality_id'];
    public $timestamps = false;

    public function property()
    {
        return $this->hasMany(Property::class);
    }
    public function beighborhoods()
    {
        return $this->hasMany(Neighborhood::class);
    }
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    public static function factoryLocation($municipality)
    {
        $result = Location::where('municipality_id', $municipality)->pluck('id')->all();
        isset($result) ? $response = 1 : $response = self::randomFactory($result);
        return $response;
    }
}
