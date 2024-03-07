<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    public function run(): void
    {
        if (!DB::table('roles')->where('name', '=', 'Admin')->first()) {
            (new Role([
                'name' => 'Admin',
            ]))->save();
        }
    }
}
