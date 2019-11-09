<?php
use App\Models\Modelsgenerals\Municipality;
use Illuminate\Database\Seeder;

class MunicipalityTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/municipalities.json");
        $municipalities = json_decode($data, true);
        foreach ($municipalities as $value) {
            //dd($value['code']);
            Municipality::create([
               'description'      => $value['description'],
               'departament_id'      => $value['id_departament']
            ]);
        }
    }
}
