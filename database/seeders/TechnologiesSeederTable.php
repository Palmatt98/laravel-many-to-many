<?php

namespace Database\Seeders;

use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TechnologiesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) { 
            $tech = new Technology();
            $tech->name = $faker->sentence(1);
            $tech->slug = Str::slug($tech->name);
            $tech->save();
        }
    }
}
