<?php

namespace Database\Seeders;

use Bouncer;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = Bouncer::role()->firstOrCreate([
            'name' => 'seller',
            'title' => 'Seller',
        ]);

        $buyer = Bouncer::role()->firstOrCreate([
            'name' => 'buyer',
            'title' => 'Buyer',
        ]);
    }
}
