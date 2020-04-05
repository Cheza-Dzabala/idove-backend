<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class defaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'default',
            'email' => env('DEFAULT_ADMIN_EMAIL'),
            'username' => 'admin',
            'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
            'is_staff' => true,
            'is_active' => true,
            'last_login' => null
        ]);
    }
}
