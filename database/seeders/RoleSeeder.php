<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Tools\AdminProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    public function run(): void
    {
        if (!(new AdminProvider())->getRole()) {
            (new Role([
                'name' => 'Admin',
            ]))->save();
        }
    }
}
