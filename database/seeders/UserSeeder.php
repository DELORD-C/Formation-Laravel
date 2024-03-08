<?php

namespace Database\Seeders;

use App\Models\User;
use App\Tools\AdminProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void
    {
        $provider = new AdminProvider();
        $admin = $provider->getUser();
        $roleId = $provider->getRoleId();

        if (!$admin) {
            (new User([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin')
            ]))->save();
            $admin = $provider->getUser();
        }

        if (!DB::table('role_user')->where(
            'role_id',
            '=',
            $roleId
        )->where(
            'user_id',
            '=',
            $admin->id
        )->first()) {
            DB::table('role_user')->insert([
                'role_id' => $roleId,
                'user_id' => $admin->id
            ]);
        }

        if (count(User::all()) < 6) {
            User::factory()
                ->count(6 - count(User::all()))
                ->create();
        }
    }
}
