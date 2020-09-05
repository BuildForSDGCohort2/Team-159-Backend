<?php

use Illuminate\Database\Seeder;
use App\package\Status;

class PackageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete all status table
        Status::truncate();

        Status::create([
            'status' => 'pending'
        ]);

        Status::create([
            'status' => 'Pickup'
        ]);

        Status::create([
            'status' => 'inTransit'
        ]);

        Status::create([
            'status' => 'delivered'
        ]);
    }
}
