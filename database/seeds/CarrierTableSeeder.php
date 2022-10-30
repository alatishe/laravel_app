<?php
use App\Models\Carrier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CarrierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            factory(Carrier::class, 10)->create();

            Model::reguard();
        }
    }
}
