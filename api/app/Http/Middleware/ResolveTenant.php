<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Domain\Tenant\Contracts\TenantRepository;
use App\Application\Tenant\TenantContext;
use Symfony\Component\HttpFoundation\Response;

class ResolveTenant
{
    public function __construct(
        private TenantRepository $tenants
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        $tenant = $this->tenants->findByHost($host);

        if (!$tenant || !$tenant->isActive()) {
            abort(404, 'Tenant not found');
        }

        TenantContext::set($tenant);

        return $next($request);
    }
}
