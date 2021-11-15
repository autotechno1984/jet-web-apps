<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankdetail = [
            ['bank_id' => '1',
             'nama' => 'BCA',
             'nama_bank' => 'budi',
             'nomor_akun' => '123456789'
            ],
            ['bank_id' => '2',
                'nama' => 'BNI',
                'nama_bank' => 'ANI',
                'nomor_akun' => '113456789'
            ],
            ['bank_id' => '3',
                'nama' => 'BRI',
                'nama_bank' => 'JOHAN',
                'nomor_akun' => '0017129192312321'
            ],
            ['bank_id' => '4',
                'nama' => 'MANDIRI',
                'nama_bank' => 'BUDI GUNAWAN',
                'nomor_akun' => '12312321321'
            ],
            ['bank_id' => '5',
                'nama' => 'DANA',
                'nama_bank' => 'MUTAMANAN',
                'nomor_akun' => '97123123123'
            ],
            ['bank_id' => '6',
                'nama' => 'OVO',
                'nama_bank' => 'DENNY',
                'nomor_akun' => '091231231231'
            ],
            ['bank_id' => '7',
                'nama' => 'GOPAY',
                'nama_bank' => 'PISANG',
                'nomor_akun' => '0812312321'
            ],
            ['bank_id' => '8',
                'nama' => 'LINKAJA',
                'nama_bank' => 'Brother',
                'nomor_akun' => '081232132132'
            ],
        ];

        DB::table('bank_details')->insert($bankdetail);
    }
}
