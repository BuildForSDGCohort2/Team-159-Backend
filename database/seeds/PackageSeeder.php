<?php

use Illuminate\Database\Seeder;
use App\package\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::truncate();

        Package::create([
            'package_name' => 'Shoe Boxes',
            'package_description' => 'This Boxes are amazing',
            'package_weight' => 20,
            'package_category' => '1',
            'package_pickup_address' => '33 Ademola Street',
            'package_delivery_address' => '',
            'company_id' => 1,
            'status_id' => 1,
            'user_id' => 1,
        ]);
    }
}
