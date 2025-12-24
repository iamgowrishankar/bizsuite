<?php

namespace App\Application\Auth;

use App\Domain\Auth\Contracts\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Application\Tenant\TenantContext;
use App\Infrastructure\Persistence\Eloquent\Models\UserModel;

class LoginUser
{
    public function __construct(
        private UserRepository $users
    ) {}

    public function execute(string $email, string $password): string
    {
        $tenant = TenantContext::get();

        $user = $this->users->findByEmailAndTenant(
            $email,
            $tenant->id()
        );

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials',
            ]);
        }

        $model = \App\Infrastructure\Persistence\Eloquent\Models\UserModel::where('email', $email)
            ->where('tenant_id', $tenant->id())
            ->first();

        if (!Hash::check($password, $model->password)) {
            throw ValidationException::withMessages([
                'password' => 'Invalid credentials',
            ]);
        }

        return $model->createToken('api')->plainTextToken;
    }
}
