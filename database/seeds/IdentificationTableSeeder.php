<?php
use App\Models\Modelsgenerals\{ Identification };
use Illuminate\Database\Seeder;

class IdentificationTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/identifications.json");
        $identifications = json_decode($data, true);
        foreach ($identifications as $value) {
            Identification::create([
                'description' => $value['description'],
                'short_name' => $value['short_name']
            ]);
        }
    }
}
