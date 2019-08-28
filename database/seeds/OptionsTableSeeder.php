<?php

use Illuminate\Database\Seeder;
use App\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Option::class)->create([
            'option' => 'Tabung Perdana',
        ]);

        factory(Option::class)->create([
            'option' => 'Tabung Kosong',
        ]);

        factory(Option::class)->create([
            'option' => 'Tabung Isi',
        ]);
    }
}
