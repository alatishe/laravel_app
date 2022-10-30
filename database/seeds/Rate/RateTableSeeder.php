<?php

use App\Models\Carrier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            factory(Rate::class, 10)->create();

            Model::reguard();
        }
    }
}
