<?php

namespace App\Policies;

use App\Infrastructure\Persistence\Eloquent\Models\UserModel;

class InvoicePolicy
{
    public function create(UserModel $user): bool
    {
        return in_array($user->role, ['owner', 'admin']);
    }

    public function view(UserModel $user): bool
    {
        return true;
    }
}
