<?php

use Illuminate\Database\Seeder;
use App\Extinguisher;
class ExtinguisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Extinguisher::class, 25)->create();
    }
}
