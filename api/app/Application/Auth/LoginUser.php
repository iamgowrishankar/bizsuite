<?php

namespace App\Application\Auth;

use App\Domain\Auth\Contracts\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Application\Tenant\TenantContext;

class LoginUser
{
    public function __construct(
        private UserRepository $users
    ) {}

    public function execute(string $email, string $password): string
    {
        $user = $this->users->findByEmail($email);

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials',
            ]);
        }

        // Tenant boundary check
        $tenant = TenantContext::get();
        if ($user->tenantId() !== $tenant->id()) {
            throw ValidationException::withMessages([
                'email' => 'User does not belong to this tenant',
            ]);
        }

        // Password check (delegated to infra later)
        $model = \App\Infrastructure\Persistence\Eloquent\Models\UserModel::where('email', $email)->first();

        if (!Hash::check($password, $model->password)) {
            throw ValidationException::withMessages([
                'password' => 'Invalid credentials',
            ]);
        }

        return $model->createToken('api')->plainTextToken;
    }
}
