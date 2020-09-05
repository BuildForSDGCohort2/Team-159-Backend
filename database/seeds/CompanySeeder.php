<?php

use Illuminate\Database\Seeder;
use App\dispatcher\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();

        $comany = Company::create([
            'company_name' => 'Yoo Collections',
            'company_description' => 'we offer delivery services',
            'telephone_number' => '07069688056',
            'company_address' => 'Ibadan',
        
        ]);
    }
}
