<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SetDynamicDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->db_name) {
            Config::set('database.connections.dynamic', [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '172.20.160.53'),
                'database' => $user->db_name,
                'username' => $user->db_username,
                'password' => $user->db_password, // pastikan ini bukan hashed password
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
            ]);
    
            DB::purge('dynamic');
            DB::reconnect('dynamic');
        }

        return $next($request);
    }
}
