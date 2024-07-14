<?php

namespace App\Http\Middleware;

use App\Models\ProductModel;
use App\Models\TokoModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class productOwnerShip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Ambil id toko
        $toko = TokoModel::where('users_id', Auth::user()->id)->first();

        // Ambil product yang sedang diakses dari routes
        $product = ProductModel::where('id', $request->route('id'))->first();

        // Ambil ID toko dari product yang diakses
        $tokoIdFromProduct = $product->toko_id;

        // Jika toko yang sedang login tidak sama dengan toko yang berhak mengakses product
        if ($toko->id != $tokoIdFromProduct) {
            // Redirect ke halaman lain atau tampilkan pesan error
            return back()->with('error', 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
        return $next($request);
    }
}
