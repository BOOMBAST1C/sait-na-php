<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // 1. Проверяем, авторизован ли пользователь вообще
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Сначала войдите в аккаунт.');
        }

        // 2. Получаем роль текущего пользователя
        $userRole = auth()->user()->role->name ?? '';

        // 3. Разбиваем строку ролей по символу '|' (чтобы можно было указать несколько, например 'journalist|admin')
        $allowedRoles = explode('|', $roles);

        // 4. Проверяем, есть ли роль пользователя в списке разрешенных
        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'У вас нет прав доступа к этой странице.');
        }

        // 5. Если всё хорошо, пропускаем запрос дальше
        return $next($request);
    }
}