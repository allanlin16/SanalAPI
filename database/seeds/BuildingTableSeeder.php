<?php

use Illuminate\Database\Seeder;
use App\Building;
class BuildingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Building::class, 5)->create();
    }
}
