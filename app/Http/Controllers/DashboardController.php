<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Omset hari ini - dengan fallback
        try {
            $todayRevenue = Order::whereDate('created_at', Carbon::today())
                ->where('status', 'completed')
                ->sum('total_amount') ?? 0;
        } catch (\Exception $e) {
            $todayRevenue = 0;
        }

        // Jumlah order hari ini - dengan fallback (hanya completed)
        try {
            $todayOrders = Order::whereDate('created_at', Carbon::today())
                ->where('status', 'completed')
                ->count() ?? 0;
        } catch (\Exception $e) {
            $todayOrders = 0;
        }

        // Data omset per bulan (12 bulan terakhir) - dengan fallback
        try {
            $monthlyRevenue = Order::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('SUM(total_amount) as revenue')
                )
                ->where('created_at', '>=', Carbon::now()->subMonths(11)->startOfMonth())
                ->where('status', 'completed')
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();
        } catch (\Exception $e) {
            $monthlyRevenue = collect();
        }

        // Format data untuk chart
        $chartData = [];
        $chartLabels = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->month;
            $year = $date->year;
            
            $revenue = $monthlyRevenue->where('month', $month)
                                   ->where('year', $year)
                                   ->first();
            
            $chartLabels[] = $date->format('M Y');
            $chartData[] = $revenue ? $revenue->revenue : 0;
        }

        // Menu terlaris hari ini - dengan fallback jika tidak ada data (hanya completed orders)
        try {
            $topMenus = OrderItem::select('order_items.menu_name as name', 'order_items.menu_image as image', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                ->whereDate('orders.created_at', Carbon::today())
                ->where('orders.status', 'completed')
                ->groupBy('order_items.menu_name', 'order_items.menu_image')
                ->orderBy('total_quantity', 'desc')
                ->limit(5)
                ->get();
        } catch (\Exception $e) {
            // Jika ada error dengan query menu terlaris, gunakan array kosong
            $topMenus = collect();
        }

        return view('dashboard.index', compact(
            'todayRevenue', 
            'todayOrders', 
            'chartData', 
            'chartLabels', 
            'topMenus'
        ));
    }

    public function orders()
    {
        try {
            $orders = Order::with('orderItems')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } catch (\Exception $e) {
            $orders = Order::orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('dashboard.orders', compact('orders'));
    }

    public function completeOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            
            // Cek apakah order masih pending
            if ($order->status !== 'pending') {
                return response()->json([
                    'success' => false,
                    'message' => 'Order sudah tidak dapat diubah statusnya'
                ]);
            }

            // Update status ke completed
            $order->update(['status' => 'completed']);

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil ditandai sebagai selesai'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}