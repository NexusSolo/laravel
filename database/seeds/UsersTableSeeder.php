<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('role_name', 'Administrator')->first();

        User::create([
            'master_account_id' => 1,
            'user_name' => 'Administrator',
            'email' => 'admin@website.com',
            'password' => bcrypt('admin'),
            'user_salt' => 'admin',
            'role_id' => $role_admin->id
        ]);
    }
}
