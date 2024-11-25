<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShareCartCount
{
    public function handle($request, Closure $next)
    {
        if (session()->has('account_id')) {
            $cartCount = DB::table('invoices')
                ->join('invoice_relationships', 'invoices.id', '=', 'invoice_relationships.id_invoice')
                ->where('invoices.id_user', session('account_id'))
                ->where('invoices.trang_thai', 'Chưa mua')
                ->count();
        } else {
            $cartCount = 0;
        }

        view()->share('cartCount', $cartCount);

        return $next($request);
    }
}
