<?php
use App\Models\Modelsgenerals\Civilstatus;
use Illuminate\Database\Seeder;

class CivilstatusTableSeeder extends Seeder
{
    public function run()
    {
        $civilstatus = ['Soltero', 'Casado', 'Unión Libre', 'Divorsiado'];
        foreach ($civilstatus as $value) {
            Civilstatus::create([
            'description' => $value
            ]);
        }
       
    }
}
