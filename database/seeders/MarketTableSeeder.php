<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $market = [
           [
               'kode' => 'SHG',
               'nama' => 'SHANGHAI',
               'jambuka' => '21:00',
               'jamtutup' => '19:00',
               'jammulai' => '12:50',
               'alamatsitus' => 'www.grand-shanghai.pools.com',
               'tipe' => 'H',
           ],
           [
               'kode' => 'SGP',
               'nama' => 'SINGAPORE',
               'jambuka' => '17:30',
               'jamtutup' => '17:00',
               'jammulai' => '12:00',
               'alamatsitus' => 'www.singapore-pools.com',
               'tipe' => 'U',
           ],
           [
               'kode' => 'HKG',
               'nama' => 'HONGKONG',
               'jambuka' => '21:00',
               'jamtutup' => '19:00',
               'jammulai' => '12:50',
               'alamatsitus' => 'www.hongkong-pools.com',
               'tipe' => 'U',
           ],

       ];

        DB::table('markets')->insert($market);
    }
}
