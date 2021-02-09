<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'Administrator',
            'role_description' => 'Best for business owners and company administrators'
        ]);

        Role::create([
            'role_name' => 'Developer',
            'role_description' => 'Best for developers or people primarily using the API'
        ]);

        Role::create([
            'role_name' => 'Analyst',
            'role_description' => "Best for people who need full access to data, but don't need to update business settings"
        ]);

        Role::create([
            'role_name' => 'Support Specialist',
            'role_description' => 'Best for employees who regularly refund payments and respond to disputes'
        ]);

        Role::create([
            'role_name' => 'View only',
            'role_description' => "Best for people who need to view data, but don't need to make any updates"
        ]);
    }
}
