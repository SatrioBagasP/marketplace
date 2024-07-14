<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TokoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isShop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil id User
        $id = Auth::user()->id;

        $exist = TokoModel::where('users_id', $id)->count();
        if ($exist > 0) {
            return $next($request);
        } else {
            return back()->with('error', 'Anda tidak ada akses ke halaman ini');
        }
    }
}
