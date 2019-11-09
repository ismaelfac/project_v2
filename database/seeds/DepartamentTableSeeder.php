<?php
use App\Models\Modelsgenerals\{ Departament };
use Illuminate\Database\Seeder;

class DepartamentTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/departaments.json");
        $departaments = json_decode($data, true);
        foreach ($departaments as $value) {
            //dd($value['code']);
            Departament::create([
                'description' => $value['description'],
                'short_name' => $value['short_name'],
                'country_id' => $value['id_country']
            ]);
        }
    }
}
