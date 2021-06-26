<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
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
            'id' => '100',
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

        // $faker = Faker::create();
        // foreach(range(1,1000000) as $value) {
        //     DB::table('users')->insert([
        //         'brgy_id'       =>  1,
        //         'evacuation_id' =>  2,
        //         'name'          =>  $faker->name,
        //         'email'         =>  $faker->unique()->safeEmail,
        //         'number'        => $faker->randomNumber(),
        //         'role'          => $faker->randomElement(['admin', 'user']),
        //         'password'      => bcrypt('secret'),
        //       ]);
        // }


        DB::table('barangays')->insert([
            [
        	'barangay_name' => 'Barangka',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Calumpang',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Concepcion I (Uno)',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Concepcion II (Dos)',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Fortune',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Industrial Valley Complex',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Jesus Dela Peña',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Malanday',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Marikina Heights',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Nangka',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Parang',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'San Roque',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Santa Elena',
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
        	'barangay_name' => 'Santo Niño',
            'created_at' => now(),
            'updated_at' => now()
            ],
              [
        	'barangay_name' => 'Tañong',
            'created_at' => now(),
            'updated_at' => now()
            ],
             [
        	'barangay_name' => 'Tumana',
            'created_at' => now(),
            'updated_at' => now()
            ]
            
         ]);

    }
}
