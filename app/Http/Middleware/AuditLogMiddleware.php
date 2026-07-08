<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        if ($request->user() && $request->user()->hasRole('admin')) {
            $method = $request->method();
            $route = $request->route()?->getName() ?? $request->path();

            if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                $action = match ($method) {
                    'POST' => 'create',
                    'PUT', 'PATCH' => 'update',
                    'DELETE' => 'delete',
                    default => 'unknown',
                };

                AuditLog::create([
                    'user_id' => $request->user()->id,
                    'action' => "{$action}: {$route}",
                    'model_type' => null,
                    'model_id' => null,
                    'old_values' => null,
                    'new_values' => $request->except(['password', 'password_confirmation', '_token']),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        }
    }
}
