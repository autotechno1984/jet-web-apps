<?php

namespace Database\Seeders;

use App\Models\bank;
use App\Models\members;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//      \App\Models\User::factory(10)->create();
        $this->call([
          // gamestableseeder::class,
          // MarketTableSeeder::class,
          // BankSeeder::class,
         // BankDetailSeeder::class
        ]);
    }
}
