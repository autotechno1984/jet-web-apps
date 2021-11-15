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
                'kode' => '4DSHG',
                'nama' => '4D',
                'hadiah' => '4000',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DSH2',
                'nama' => '4D-2nd prize',
                'hadiah' => '1000',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DSH3',
                'nama' => '4D-3rd prize',
                'hadiah' => '500',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DSHS',
                'nama' => '4D Starter prize',
                'hadiah' => '200',
                'diskon' => '25',
                'kei' => '0',
            ],
            [
                'kategori' => '4D',
                'kode' => '4DSHC',
                'nama' => '4D',
                'hadiah' => '4000',
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
        ];

        DB::table('games')->insert($games);

    }
}
