<?php

namespace App\Tools;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminProvider
{
    public function getRole(): ?Role
    {
        return Role::where('name', '=', 'Admin')->first();
    }

    public function getRoleId(): int
    {
        return $this->getRole()->id;
    }

    public function getUser(): ?User
    {
        return User::where('name', '=', 'Admin')->first();
    }

    public function getUserId(): int
    {
        return $this->getUser()->id;
    }
}
