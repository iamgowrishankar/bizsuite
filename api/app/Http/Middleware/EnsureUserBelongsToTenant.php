<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Application\Tenant\TenantContext;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBelongsToTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $tenant = TenantContext::get();

        if ($user && $tenant && $user->tenant_id !== $tenant->id()) {
            abort(403, 'User does not belong to this tenant');
        }

        return $next($request);
    }
}
