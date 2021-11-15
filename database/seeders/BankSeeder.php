<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            ['kategori' => 'BANK',
             'nama' => 'BCA'
            ],
            ['kategori' => 'BANK',
                'nama' => 'BNI'
            ],
            ['kategori' => 'BANK',
                'nama' => 'BRI'
            ],
            ['kategori' => 'BANK',
                'nama' => 'MANDIRI'
            ],
            ['kategori' => 'E-WALLET',
                'nama' => 'DANA'
            ],
            ['kategori' => 'E-WALLET',
                'nama' => 'OVO'
            ],
            ['kategori' => 'E-WALLET',
                'nama' => 'GOPAY'
            ],
            ['kategori' => 'E-WALLET',
                'nama' => 'LINK-AJA'
            ],

        ];

        DB::table('banks')->insert($bank);
    }
}
