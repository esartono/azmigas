<?php

use Illuminate\Database\Seeder;
use App\TypeProduct;

class TypeProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TypeProduct::class)->create([
            'name' => 'Gas',
        ]);

        factory(TypeProduct::class)->create([
            'name' => 'Aksesoris Gas',
        ]);
    }
}
