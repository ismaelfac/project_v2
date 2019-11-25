<?php

namespace App\Models;

use Illuminate\Support\Collection as Collection;
use App\Models\Modelsgenerals \{
    Identification, Departament, Municipality, Location, Neighborhood
};
use Illuminate\Support\Facades\Auth;

trait MethodsBase
{
    private static function randomFactory(array $num)
    {
        $collection = self::Collection($num);
        $min = $collection->min();
        $max = $collection->max();
        return rand($min, $max);
    }

    private static function Collection(array $data)
    {
        return Collection::make($data);
    }
    private function getModelsGenerals()
    {
        $this->type_dni = Identification::factoryDni();
        $this->departament = Departament::factoryDepartament();
        $this->municipality = Municipality::factoryMunicipality($this->departament);
        $this->location = Location::factoryLocation($this->municipality);
        $this->neighborhood = Neighborhood::factoryNeighborhood($this->location);
        return array(
            'type_dni' => $this->type_dni,
            'departament' => $this->departament,
            'municipality' => $this->municipality,
            'location' => $this->location,
            'neighborhood' => $this->neighborhood
        );
    }
    public static function getRolesUser()
    {
        //obtener el rol_id y los permisos sobre el rol
        return (Auth::user()->roles()->with('permissions')->where('active',false)->paginate(5));   
    }
    public static function getPermissionsInModel(String $model)
    {
        $rol = Auth::user()->roles()->where('active', 1)->pluck('role_id');
        if($rol[0] === 1){
            $permission = Permission::where('slug', 'like', $model.'%')->pluck('slug');
            return $permission->map(function($item, $key){ return explode(".",$item)[1];});    
        }elseif($rol[0] === 2){
            return null;    
        }else{
            $permission = Permission::where('slug','like',$model.'%')->whereHas('roles', function($query) use ($rol){
                $query->where('role_id',$rol[0]);
            })->pluck('slug');
            return $permission->map(function($item, $key){ return explode(".",$item)[1];});
        }
    }
}