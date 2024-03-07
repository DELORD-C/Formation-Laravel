<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void
    {
        if (!DB::table('users')->where('name', '=', 'Admin')->first()) {
            (new User([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin')
            ]))->save();
        }

        if (!DB::table('role_user')->where(
            'role_id',
            '=',
            DB::table('roles')->where('name', '=', 'Admin')->first()->id
        )->where(
            'user_id',
            '=',
            DB::table('users')->where('name', '=', 'Admin')->first()->id
        )->first()) {
            DB::table('role_user')->insert([
                'role_id' => DB::table('roles')->where('name', '=', 'Admin')->first()->id,
                'user_id' => DB::table('users')->where('name', '=', 'Admin')->first()->id
            ]);
        }

        if (count(User::all()) < 6) {
            User::factory()
                ->count(6 - count(User::all()))
                ->create();
        }
    }
}
