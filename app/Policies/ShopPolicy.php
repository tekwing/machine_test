<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShopPolicy
{
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }
}
