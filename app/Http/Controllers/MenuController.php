<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('category');

        $categories = Category::all();
        $categoriesForFilter = ['all' => 'Semua Menu'];
        foreach ($categories as $cat) {
            $categoriesForFilter[$cat->id] = $cat->category_name;
        }

        $query = Menu::with('category')->available();
        
        if ($categoryId && $categoryId !== 'all') {
            $query->byCategory($categoryId);
        }
        
        $menuItems = $query->get();

        $menuItems = $menuItems->map(function($menu) {
            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'description' => $menu->description,
                'price' => (float)$menu->price,
                'category' => strtolower($menu->category->category_name),
                'category_display_name' => $menu->category->category_name,
                'image' => $menu->image_url ?? 'https://via.placeholder.com/400x300?text=' . urlencode($menu->name)
            ];
        });

        return view('menu.index', compact('menuItems', 'categoriesForFilter', 'categoryId'));
    }

    public function storeOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'customer_name' => 'required|string|min:2|max:255|regex:/^[a-zA-Z\s]+$/',
                'customer_phone' => 'required|string|min:10|max:20|regex:/^[\d\s\-\+\(\)]+$/',
                'table_number' => 'required|integer|min:1|max:20',
                'notes' => 'nullable|string|max:500',
                'items' => 'required|array|min:1',
                'items.*.id' => 'required|integer',
                'items.*.name' => 'required|string',
                'items.*.image' => 'nullable|string',
                'items.*.price' => 'required|numeric|min:0',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.subtotal' => 'required|numeric|min:0',
                'total_amount' => 'required|numeric|min:0'
            ], [
                'customer_name.required' => 'Nama lengkap wajib diisi',
                'customer_name.regex' => 'Nama hanya boleh berisi huruf dan spasi',
                'customer_phone.required' => 'Nomor telepon wajib diisi',
                'customer_phone.min' => 'Nomor telepon minimal 10 digit',
                'customer_phone.regex' => 'Format nomor telepon tidak valid',
                'table_number.required' => 'Nomor meja wajib dipilih',
                'table_number.min' => 'Nomor meja harus antara 1-20',
                'table_number.max' => 'Nomor meja harus antara 1-20',
                'items.required' => 'Minimal satu item harus dipilih',
                'items.min' => 'Minimal satu item harus dipilih'
            ]);

            DB::beginTransaction();

            // Validate total amount
            $calculatedTotal = collect($validated['items'])->sum('subtotal');
            if (abs($calculatedTotal - $validated['total_amount']) > 0.01) {
                return response()->json([
                    'success' => false,
                    'message' => 'Total amount tidak sesuai dengan perhitungan item'
                ], 400);
            }

            // Create order
            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'table_number' => $validated['table_number'],
                'total_amount' => $validated['total_amount'],
                'notes' => $validated['notes'] ?? null,
                'status' => 'pending' // Set status awal sebagai pending
            ]);

            // Create order items
            foreach ($validated['items'] as $item) {
                Log::info('Creating order item', [
                    'name' => $item['name'],
                    'image' => $item['image'] ?? 'No image',
                    'price' => $item['price']
                ]);
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_name' => $item['name'],
                    'menu_image' => $item['image'] ?? null,
                    'menu_price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal']
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat',
                'order_id' => $order->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid: ' . implode(', ', Arr::flatten($e->errors()))
            ], 422);
        } catch (\Exception $e) {
            DB::rollback();
            
            Log::error('Order creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'stack_trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan internal. Silakan coba lagi.'
            ], 500);
        }
    }

    public function orderConfirmation($orderId)
    {
        try {
            $order = Order::find($orderId);
            
            if (!$order) {
                return redirect()->route('menu.index')
                    ->with('error', 'Pesanan tidak ditemukan.');
            }

            $orderItems = OrderItem::select('*')
                ->where('order_id', $orderId)
                ->get();
            
            $order->orderItems = $orderItems;

            Log::info('Order confirmation loaded', [
                'order_id' => $orderId,
                'items_count' => $orderItems->count(),
                'order_data' => $order->toArray()
            ]);
            
            return view('order.confirmation', compact('order'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('menu.index')
                ->with('error', 'Pesanan tidak ditemukan.');
                
        } catch (\Exception $e) {
            Log::error('Order confirmation error', [
                'order_id' => $orderId,
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
            
            return redirect()->route('menu.index')
                ->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi atau hubungi administrator.');
        }
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();

            if ($user->role !== 'kasir') {
                Auth::logout();
                return back()->with('error', 'Akses ditolak! Anda bukan kasir.')->withInput();
            }

            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
        }

        return back()->with('error', 'Email atau password salah!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('menu.index')->with('success', 'Logout berhasil!');
    }
}
