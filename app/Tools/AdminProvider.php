<?php

namespace App\Tools;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminProvider
{
    public function getRole(): \StdClass|Role
    {
        return DB::table('roles')->where('name', '=', 'Admin')->first();
    }

    public function getRoleId(): int
    {
        return $this->getRole()->id;
    }

    public function getUser(): \StdClass|User
    {
        return DB::table('users')->where('name', '=', 'Admin')->first();
    }

    public function getUserId(): int
    {
        return $this->getUser()->id;
    }
}
