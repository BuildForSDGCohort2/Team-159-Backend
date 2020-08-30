<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
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

        $role = Role::where('slug', 'admin')->first();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('default'),
        ]);

        $user->role()->associate($role);
    }
}
