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
            'status' => 'pendingPickup'
        ]);

        Status::create([
            'status' => 'inTransit'
        ]);

        Status::create([
            'status' => 'delivered'
        ]);
    }
}
