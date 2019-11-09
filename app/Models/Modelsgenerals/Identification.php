<?php

namespace App\Models\Modelsgenerals;

use App\Models\MethodsBase;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use MethodsBase;

    protected $fillable = ['description', 'shortName'];
    protected $guarded = 'id';
    public $timestamps = false;

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public static function factoryDni()
    {
        $num = Identification::whereNotIn('id', [0, 4, 5])->pluck('id')->all();
        return self::randomFactory($num);

    }
}
