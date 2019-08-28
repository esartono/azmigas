<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin Ganteng',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'level' => User::ACCESS_ADMIN,
        ]);
        factory(User::class)->create([
            'name' => 'Eko Sartono',
            'email' => 'eko@gmail.com',
            'password' => bcrypt('rahasia'),
            'level' => User::ACCESS_MEMBER,
        ]);
    }
}
