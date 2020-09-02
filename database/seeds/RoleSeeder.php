<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete all entry
        Role::truncate();

        //Admin
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);

        //Dispatcher
        Role::create([
            'name' => 'Dispatcher',
            'slug' => 'dispatcher'
        ]);

        //Client
        Role::create([
            'name' => 'Client',
            'slug' => 'client'
        ]);
    }
}
