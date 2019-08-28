<?php

use Illuminate\Database\Seeder;
use App\AccountType;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AccountType::class)->create([
            'name' => 'Kas',
            'sort' => 1,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Bank',
            'sort' => 2,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Piutang',
            'sort' => 3,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Biaya Dibayar Dimuka',
            'sort' => 4,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Persediaan',
            'sort' => 5,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Aktiva Tetap',
            'sort' => 6,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Penyusutan',
            'sort' => 7,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Hutang Lancar',
            'sort' => 8,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Hutang Jangka Panjang',
            'sort' => 9,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Modal',
            'sort' => 10,
        ]);

        factory(AccountType::class)->create([
            'name' => 'LABA/RUGI',
            'sort' => 11,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Pendapatan Usaha',
            'sort' => 12,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Pendapatan Lain-Lain',
            'sort' => 13,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Harga Pokok Penjualan',
            'sort' => 14,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Biaya Operasional',
            'sort' => 15,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Operasional Training',
            'sort' => 16,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Biaya Lain-Lain',
            'sort' => 17,
        ]);

        factory(AccountType::class)->create([
            'name' => 'Biaya Penyusutan',
            'sort' => 18,
        ]);
    }
}
