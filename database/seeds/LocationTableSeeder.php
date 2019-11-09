<?php
use App\Models\Modelsgenerals\{ Location };
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/localities.json");
        $localities = json_decode($data, true);
        foreach ($localities as $value) {
            Location::create([
                'description' => $value['description'],
                'short_name' => $value['short_name'],
                'municipality_id' => $value['id_municipality']
            ]);
        }
    }
}
