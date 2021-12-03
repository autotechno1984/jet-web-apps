<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gamestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            [
                'kategori' => '4D',
                'kode' => '4DH1',
                'nama' => '4D-1st prize',
                'hadiah' => '4000',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DH2',
                'nama' => '4D-2nd prize',
                'hadiah' => '1000',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DH3',
                'nama' => '4D-3rd prize',
                'hadiah' => '500',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DST',
                'nama' => '4D Starter prize',
                'hadiah' => '250',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DCT',
                'nama' => '4D',
                'hadiah' => '100',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4D',
                'nama' => '4D',
                'hadiah' => '3000',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '3D',
                'kode' => '3D',
                'nama' => '3D',
                'hadiah' => '500',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '2D',
                'kode' => '2D',
                'nama' => '2D',
                'hadiah' => '70',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => 'COLOK',
                'kode' => 'CLB',
                'nama' => 'COLOK-BEBAS',
                'hadiah' => '1.5',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => 'COLOK',
                'kode' => 'CLM',
                'nama' => 'COLOK-MACAU',
                'hadiah' => '6',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => 'COLOK',
                'kode' => 'CLJ',
                'nama' => 'COLOK-JITU',
                'hadiah' => '9',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => 'COLOK',
                'kode' => 'CLN',
                'nama' => 'COLOK-NAGA',
                'hadiah' => '20',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '5050',
                'kode' => '50UM',
                'nama' => 'BSR-KCL-GNP-GJL-TGH-TPI',
                'hadiah' => '1',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => '5050',
                'kode' => '50SP',
                'nama' => '5050 SPESIAL ',
                'hadiah' => '1',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => '5050',
                'kode' => '50KB',
                'nama' => '5050 KOMBINASI ',
                'hadiah' => '1',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => 'MACAU',
                'kode' => 'MCU',
                'nama' => 'MACAU',
                'hadiah' => '2.6',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => 'DASAR',
                'kode' => 'DSR',
                'nama' => 'DASAR ',
                'hadiah' => '1',
                'diskon' => '0',
                'kei' => '0',
            ],
            [
                'kategori' => 'SHIO',
                'kode' => 'SHIO',
                'nama' => 'SHIO',
                'hadiah' => '9',
                'diskon' => '0',
                'kei' => '0',
            ],
        ];

        DB::table('games')->insert($games);

    }
}
