<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Users;
use App\Models\Order;
use App\Models\Pemesanan;
use App\Models\Menu;
use App\Models\DetailPemesanan;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = Users::count();
        $totalOrder = Pemesanan::count();

        $totalAllUsers = Users::count();
        $totalUsers = Users::where('role', 'users')->count();

        $todayDate = Carbon::now()->format('Y-m-d');

        $todayOrder = Pemesanan::whereDate('created_at', $todayDate)->count();

        $menuStatuses = Menu::select('nama', 'status')->get();

        $totalRevenue = DetailPemesanan::sum('total_bayar');

        $order = DetailPemesanan::with('pemesanan')->get();

        return view('dashboard', compact('totalUsers', 'totalOrder', 'totalAllUsers', 'todayOrder', 'menuStatuses', 'totalRevenue', 'order'));

    }

}