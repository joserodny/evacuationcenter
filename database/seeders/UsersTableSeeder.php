<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'brgy_id' => '0',
            'evacuation_id' => '0',
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'number' => '099999999',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'brgy_id' => '0',
            'evacuation_id' => '0',
            'name' => 'user user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'number' => '099999999',
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
