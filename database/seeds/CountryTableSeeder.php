<?php
use App\Models\Modelsgenerals\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/countries.json");
        $countries = json_decode($data, true);
        foreach ($countries as $value) {
            Country::create([
                'code' => $value['code'],
                'description' => $value['description'],
                'nationality' => $value['nationality'],
                'short_name' => $value['short_name'] 
            ]);
        }
    }
}
