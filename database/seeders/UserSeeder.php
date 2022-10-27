<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id'   => 'A',
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role_id'   => 'U',
        ]);
    }
}
