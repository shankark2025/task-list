<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function count(): int
    {
        // Centralized logic
        //return User::count();
        return User::count();
    }
    public function verifiedCount(): int
    {
        // Centralized logic
        //return User::count();
        return User::whereNotNull('email_verified_at')->count();
    }

     public function findUser(int $id): array
    {
         $user = User::find($id);
         return $user ? $user->toArray() : null;
    }
}
