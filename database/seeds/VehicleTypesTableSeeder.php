<?php

use Illuminate\Database\Seeder;
use App\VehicleType;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleType::class)->create([
            'name' => 'Motor',
        ]);
        factory(VehicleType::class)->create([
            'name' => 'Mobil Pribadi',
        ]);
        factory(VehicleType::class)->create([
            'name' => 'Mobil Bak',
        ]);
        factory(VehicleType::class)->create([
            'name' => 'Truk',
        ]);
    }
}
