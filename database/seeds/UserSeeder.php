<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete all entry
        User::truncate();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('default'),
            'role_id' => 1,
        ]);
        $user = User::create([
            'name'=> 'Oluyosola',
            'email'=>'oluyosola@gmail.com',
            'password'=> Hash::make('oluyosola'),
            'role_id' => 2,
        ]);
    }
}
