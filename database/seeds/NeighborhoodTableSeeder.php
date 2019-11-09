<?php
use App\Models\Modelsgenerals\Neighborhood;
use Illuminate\Database\Seeder;

class NeighborhoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents("database/Queries/neighborhoods.json");
        $neighborhoods = json_decode($data, true);
        foreach ($neighborhoods as $value) {
            //dd($value['code']);
            Neighborhood::create([
                'description' => $value['description'],
                'location_id' => $value['id_location']
            ]);
        }
    }
}
