<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Restoran Ramen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #f39c12;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray);
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            color: white;
            padding: 3rem 0 2rem;
            margin-bottom: 2rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .category-filter {
            background: white;
            border-radius: 15px;
            padding: 1.25rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            position: sticky;
            top: 80px;
            z-index: 999;
        }

        .btn-category {
            background: white;
            border: 2px solid #e9ecef;
            color: var(--dark-gray);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0.25rem;
            text-decoration: none;
            display: inline-block;
        }

        .btn-category:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.2);
        }

        .btn-category.active {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            margin-bottom: 2rem;
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .menu-card-img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .menu-card:hover .menu-card-img {
            transform: scale(1.05);
        }

        .menu-card-body {
            padding: 1.5rem;
        }

        .menu-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .menu-description {
            color: var(--dark-gray);
            font-size: 0.95rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .menu-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .btn-order {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c0392b 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-order:hover {
            background: linear-gradient(135deg, #c0392b 0%, var(--secondary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
            color: white;
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 3rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--dark-gray);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 0 1.5rem;
                margin-bottom: 1.5rem;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .hero-subtitle {
                font-size: 0.95rem;
            }

            .navbar-brand {
                font-size: 1.4rem;
            }

            .category-filter {
                padding: 1rem;
                margin-bottom: 1.5rem;
                position: static;
            }

            .btn-category {
                padding: 0.5rem 0.8rem;
                margin: 0.15rem;
                font-size: 0.85rem;
                border-radius: 20px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-top: 1rem;
            }

            .menu-card {
                margin-bottom: 1.5rem;
            }

            .menu-card-img {
                height: 200px;
            }

            .menu-card-body {
                padding: 1.25rem;
            }

            .menu-title {
                font-size: 1.2rem;
            }

            .menu-description {
                font-size: 0.9rem;
                margin-bottom: 0.8rem;
            }

            .menu-price {
                font-size: 1.3rem;
            }

            .btn-order {
                padding: 0.8rem 1.2rem;
                font-size: 0.95rem;
            }

            .cart-btn {
                padding: 0.5rem 0.8rem;
                font-size: 0.85rem;
                min-width: 100px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .hero-title {
                font-size: 1.6rem;
            }

            .hero-subtitle {
                font-size: 0.9rem;
            }

            .category-filter .row {
                text-align: center;
            }

            .category-filter .col-md-3,
            .category-filter .col-md-9 {
                margin-bottom: 1rem;
            }

            .btn-category {
                padding: 0.4rem 0.7rem;
                font-size: 0.8rem;
                margin: 0.1rem;
            }

            .menu-card-img {
                height: 180px;
            }

            .menu-card-body {
                padding: 1rem;
            }

            .menu-title {
                font-size: 1.1rem;
            }

            .menu-description {
                font-size: 0.85rem;
            }

            .menu-price {
                font-size: 1.2rem;
            }

            .cart-btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.8rem;
                min-width: 90px;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Login & Cart Styles */
        .login-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            min-width: 110px;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, #34495e 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
            color: white;
            text-decoration: none;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            min-width: 150px;
        }

        .dropdown-item {
            color: var(--dark-gray);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .dropdown-item:hover {
            background: var(--light-gray);
            color: var(--secondary-color);
        }

        .cart-btn {
            position: relative;
            background: var(--secondary-color);
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .cart-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            color: white;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        .cart-badge.has-items {
            animation: bounce 0.5s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Mobile Quick Actions */
        .mobile-cart-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            display: none;
            width: 60px;
            height: 60px;
            background: var(--secondary-color);
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(231, 76, 60, 0.4);
            border: none;
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            align-items: center;
            justify-content: center;
        }

        .mobile-cart-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(231, 76, 60, 0.6);
            color: white;
        }

        .mobile-cart-float .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 0.8rem;
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .scroll-to-top {
            position: fixed;
            bottom: 90px;
            right: 20px;
            z-index: 1040;
            display: none;
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
            border: none;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            align-items: center;
            justify-content: center;
        }

        .scroll-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(44, 62, 80, 0.4);
            color: white;
        }

        .cart-item {
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            background: var(--light-gray);
            border: 1px solid #ddd;
            color: var(--dark-gray);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .checkout-form {
            background: var(--light-gray);
            padding: 1.5rem;
            border-radius: 10px;
            margin-top: 1rem;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
        }

        .btn-checkout {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #c0392b 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-checkout:hover {
            background: linear-gradient(135deg, #c0392b 0%, var(--secondary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        <div class="container">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
        <div class="container">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('menu.index') }}">
                <i class="bi bi-bowl-hot"></i>
                Nusantara Ramen
            </a>
            <div class="navbar-nav ms-auto d-flex align-items-center">
                @auth
                    <!-- Logged in kasir -->
                    <div class="dropdown me-2">
                        <button class="login-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-check me-1"></i>
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-item">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Login button -->
                    <a href="{{ route('login') }}" class="login-btn me-2">
                        <i class="bi bi-person-circle me-1"></i>
                        Login Kasir
                    </a>
                @endauth
                <button class="cart-btn" data-bs-toggle="modal" data-bs-target="#cartModal">
                    <i class="bi bi-cart3 me-1"></i>
                    Keranjang
                    <span class="cart-badge" id="cartBadge">0</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="hero-title">Menu Istimewa Kami</h1>
            <p class="hero-subtitle">Nikmati kelezatan ramen autentik dan minuman segar pilihan</p>
            <div class="mt-3 d-flex justify-content-center">
                <div class="d-flex align-items-center bg-white bg-opacity-10 rounded-pill px-3 py-1">
                    <i class="bi bi-info-circle me-2"></i>
                    <small>Pilih kategori → Tambah ke keranjang → Pesan sekarang</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Category Filter -->
        <div class="category-filter">
            <div class="row align-items-center">
                <div class="col-md-3 col-12">
                    <h6 class="mb-md-0 mb-2 text-muted text-center text-md-start">
                        <i class="bi bi-funnel me-2"></i>Pilih Kategori:
                    </h6>
                </div>
                <div class="col-md-9 col-12">
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                        @foreach($categoriesForFilter as $key => $name)
                        <a href="{{ route('menu.index', ['category' => $key]) }}"
                            class="btn-category {{ $categoryId == $key ? 'active' : '' }}"
                            data-category="{{ $key }}">
                            @if($key === 'all')
                            <i class="bi bi-grid me-1"></i>
                            @elseif(str_contains(strtolower($name), 'menu'))
                            <i class="bi bi-bowl-hot me-1"></i>
                            @elseif(str_contains(strtolower($name), 'minuman'))
                            <i class="bi bi-cup me-1"></i>
                            @elseif(str_contains(strtolower($name), 'topping'))
                            <i class="bi bi-plus-circle me-1"></i>
                            @elseif(str_contains(strtolower($name), 'dessert'))
                            <i class="bi bi-cake2 me-1"></i>
                            @else
                            <i class="bi bi-star me-1"></i>
                            @endif
                            {{ $name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Spinner -->
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2 text-muted">Memuat menu...</p>
        </div>

        <!-- Menu Items -->
        <div id="menuContainer" class="fade-in">
            @if(count($menuItems) > 0)
            <div class="menu-grid">
                @foreach($menuItems as $item)
                <div class="menu-card" data-category="{{ $item['category'] }}">
                    <div class="position-relative">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-100 menu-card-img">
                        <span class="category-badge">
                            {{ $item['category_display_name'] }}
                        </span>
                    </div>
                    <div class="menu-card-body">
                        <h5 class="menu-title">{{ $item['name'] }}</h5>
                        <p class="menu-description">{{ $item['description'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="menu-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                        </div>
                        <button class="btn btn-order mt-2 add-to-cart-btn" 
                                data-id="{{ $item['id'] }}"
                                data-name="{{ $item['name'] }}"
                                data-price="{{ $item['price'] }}"
                                data-description="{{ $item['description'] }}"
                                data-image="{{ $item['image'] }}">
                            <i class="bi bi-cart-plus me-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <i class="bi bi-search"></i>
                <h4>Tidak ada menu ditemukan</h4>
                <p>Coba pilih kategori lain atau kembali ke semua menu</p>
                <a href="{{ route('menu.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Semua Menu
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">
                        <i class="bi bi-cart3 me-2"></i>
                        Keranjang Belanja
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <div class="text-center py-4 text-muted" id="emptyCart">
                            <i class="bi bi-cart-x" style="font-size: 3rem;"></i>
                            <p class="mt-2">Keranjang Anda masih kosong</p>
                            <small>Silakan tambahkan menu favorit Anda</small>
                        </div>
                    </div>

                    <div id="cartSummary" style="display: none;">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Total Pesanan:</h5>
                            <h4 class="mb-0 text-danger" id="cartTotal">Rp 0</h4>
                        </div>

                        <div class="checkout-form">
                            <h6 class="mb-3">
                                <i class="bi bi-person-fill me-2"></i>
                                Informasi Pelanggan
                            </h6>
                            <form id="checkoutForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="customerName" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="customerName" name="customer_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="customerPhone" class="form-label">Nomor Telepon/WhatsApp *</label>
                                        <input type="tel" class="form-control" id="customerPhone" name="customer_phone" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tableNumber" class="form-label">Nomor Meja *</label>
                                    <select class="form-control" id="tableNumber" name="table_number" required>
                                        <option value="">Pilih Nomor Meja</option>
                                        @for($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">Meja {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="orderNotes" class="form-label">Catatan Pesanan</label>
                                    <textarea class="form-control" id="orderNotes" name="notes" rows="3" placeholder="Contoh: Pedas level sedang, tanpa cabe..."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" id="clearCart" style="display: none;">
                        <i class="bi bi-trash me-1"></i>
                        Kosongkan Keranjang
                    </button>
                    <button type="button" class="btn btn-checkout" id="checkoutBtn" style="display: none;">
                        <i class="bi bi-check-circle me-2"></i>
                        Konfirmasi Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Floating Cart Button -->
    <button class="mobile-cart-float" id="mobileCartBtn" data-bs-toggle="modal" data-bs-target="#cartModal">
        <i class="bi bi-cart3"></i>
        <span class="cart-count" id="mobileCartCount">0</span>
    </button>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Footer -->
    <footer class="mt-5 py-4" style="background-color: var(--primary-color); color: white;">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Ramen House. Dibuat dengan ❤️ untuk pecinta ramen.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cart functionality with localStorage fallback
        let cart = [];
        let cartUpdateCallbacks = [];

        // Initialize cart from localStorage with error handling
        function initializeCart() {
            try {
                const savedCart = localStorage.getItem('ramenCart');
                if (savedCart) {
                    cart = JSON.parse(savedCart);
                    // Validate cart structure
                    cart = cart.filter(item => 
                        item.id && item.name && typeof item.price === 'number' && 
                        typeof item.quantity === 'number' && item.quantity > 0
                    );
                }
            } catch (error) {
                console.warn('Failed to load cart from localStorage:', error);
                cart = [];
            }
        }

        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount).replace('IDR', 'Rp');
        }

        // Register callback for cart updates
        function onCartUpdate(callback) {
            cartUpdateCallbacks.push(callback);
        }

        // Execute all cart update callbacks
        function executeCartCallbacks() {
            cartUpdateCallbacks.forEach(callback => {
                try {
                    callback();
                } catch (error) {
                    console.error('Cart callback error:', error);
                }
            });
        }

        // Add item to cart with validation
        function addToCart(id, name, price, description, image) {
            // Validate input parameters
            if (!id || !name || !price || price <= 0) {
                showNotification('Data menu tidak valid', 'error');
                return;
            }

            const existingItem = cart.find(item => item.id == id); // Use loose comparison for flexibility

            if (existingItem) {
                // Check quantity limit
                if (existingItem.quantity >= 99) {
                    showNotification('Maksimal 99 item per menu', 'warning');
                    return;
                }
                existingItem.quantity += 1;
                existingItem.subtotal = existingItem.price * existingItem.quantity;
            } else {
                cart.push({
                    id: String(id), // Ensure consistent string format
                    name: String(name),
                    price: parseFloat(price),
                    description: String(description || ''),
                    image: String(image || ''),
                    quantity: 1,
                    subtotal: parseFloat(price)
                });
            }

            updateCart();
            showCartNotification(name);
        }

        // Enhanced notification system
        function showNotification(message, type = 'success', duration = 3000) {
            const typeClasses = {
                'success': 'bg-success',
                'error': 'bg-danger',
                'warning': 'bg-warning text-dark',
                'info': 'bg-info'
            };

            const icons = {
                'success': 'bi-check-circle',
                'error': 'bi-exclamation-circle',
                'warning': 'bi-exclamation-triangle',
                'info': 'bi-info-circle'
            };

            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white ${typeClasses[type] || 'bg-success'} border-0 position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            toast.setAttribute('data-bs-delay', duration);
            
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="bi ${icons[type] || 'bi-check-circle'} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;

            document.body.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast, { delay: duration });
            bsToast.show();

            // Remove toast after hiding
            toast.addEventListener('hidden.bs.toast', () => {
                document.body.removeChild(toast);
            });

            return bsToast;
        }

        // Show notification when item added
        function showCartNotification(itemName) {
            showNotification(`${itemName} ditambahkan ke keranjang`, 'success');
        }

        // Update cart display
        function updateCart() {
            try {
                localStorage.setItem('ramenCart', JSON.stringify(cart));
            } catch (error) {
                console.error('Failed to save cart to localStorage:', error);
                // Fallback: continue without localStorage
            }

            const cartBadge = document.getElementById('cartBadge');
            const mobileCartCount = document.getElementById('mobileCartCount');
            const cartItems = document.getElementById('cartItems');
            const cartSummary = document.getElementById('cartSummary');
            const cartTotal = document.getElementById('cartTotal');
            const emptyCart = document.getElementById('emptyCart');
            const clearCartBtn = document.getElementById('clearCart');
            const checkoutBtn = document.getElementById('checkoutBtn');

            // Update badge and mobile cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            
            if (cartBadge) {
                cartBadge.textContent = totalItems;
                cartBadge.style.display = totalItems > 0 ? 'flex' : 'none';
            }
            
            if (mobileCartCount) {
                mobileCartCount.textContent = totalItems;
                mobileCartCount.style.display = totalItems > 0 ? 'flex' : 'none';
            }
            
            // Add animation class if items exist
            if (totalItems > 0) {
                cartBadge?.classList.add('has-items');
                setTimeout(() => cartBadge?.classList.remove('has-items'), 500);
            }

            if (cart.length === 0) {
                if (emptyCart) emptyCart.style.display = 'block';
                if (cartSummary) cartSummary.style.display = 'none';
                if (clearCartBtn) clearCartBtn.style.display = 'none';
                if (checkoutBtn) checkoutBtn.style.display = 'none';
                if (cartItems) {
                    cartItems.innerHTML = `
                        <div class="text-center py-4 text-muted" id="emptyCart">
                            <i class="bi bi-cart-x" style="font-size: 3rem;"></i>
                            <p class="mt-2">Keranjang Anda masih kosong</p>
                            <small>Silakan tambahkan menu favorit Anda</small>
                        </div>
                    `;
                }
            } else {
                if (emptyCart) emptyCart.style.display = 'none';
                if (cartSummary) cartSummary.style.display = 'block';
                if (clearCartBtn) clearCartBtn.style.display = 'inline-block';
                if (checkoutBtn) checkoutBtn.style.display = 'inline-block';

                let cartHTML = '';
                let totalAmount = 0;

                cart.forEach((item, index) => {
                    totalAmount += item.subtotal;
                    cartHTML += `
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <img src="${item.image}" alt="${item.name}" class="img-fluid rounded" style="height: 60px; object-fit: cover;">
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-1">${item.name}</h6>
                                    <small class="text-muted">${formatCurrency(item.price)}</small>
                                </div>
                                <div class="col-3">
                                    <div class="quantity-controls justify-content-end">
                                        <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                                        <span class="mx-2">${item.quantity}</span>
                                        <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                                    </div>
                                    <div class="text-end mt-1">
                                        <small class="fw-bold">${formatCurrency(item.subtotal)}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                if (cartItems) cartItems.innerHTML = cartHTML;
                if (cartTotal) cartTotal.textContent = formatCurrency(totalAmount);
            }

            // Execute all registered callbacks
            executeCartCallbacks();
        }

        // Update quantity with bounds checking
        function updateQuantity(index, change) {
            if (!cart[index]) {
                showNotification('Item tidak ditemukan', 'error');
                return;
            }

            const newQuantity = cart[index].quantity + change;

            if (newQuantity <= 0) {
                // Remove item with confirmation for negative change
                if (change < 0) {
                    cart.splice(index, 1);
                    showNotification('Item dihapus dari keranjang', 'info');
                }
            } else if (newQuantity > 99) {
                showNotification('Maksimal 99 item per menu', 'warning');
                return;
            } else {
                cart[index].quantity = newQuantity;
                cart[index].subtotal = cart[index].price * cart[index].quantity;
            }

            updateCart();
        }

        // Clear cart with enhanced confirmation
        function clearCart() {
            if (cart.length === 0) {
                showNotification('Keranjang sudah kosong', 'info');
                return;
            }

            if (confirm('Apakah Anda yakin ingin mengosongkan keranjang? Semua item akan dihapus.')) {
                cart = [];
                updateCart();
                showNotification('Keranjang berhasil dikosongkan', 'success');
                
                // Clear form jika ada
                const checkoutForm = document.getElementById('checkoutForm');
                if (checkoutForm) {
                    checkoutForm.reset();
                }
            }
        }

        // Checkout process
        function checkout() {
            const customerName = document.getElementById('customerName').value.trim();
            const customerPhone = document.getElementById('customerPhone').value.trim();
            const tableNumber = document.getElementById('tableNumber').value.trim();
            const orderNotes = document.getElementById('orderNotes').value.trim();

            if (!customerName || !customerPhone || !tableNumber) {
                showNotification('Mohon lengkapi nama, nomor telepon, dan nomor meja Anda.', 'warning');
                return;
            }

            if (cart.length === 0) {
                showNotification('Keranjang belanja masih kosong.', 'warning');
                return;
            }

            // Validate phone number (enhanced)
            const phoneRegex = /^[\d\s\-\+\(\)]+$/;
            if (!phoneRegex.test(customerPhone) || customerPhone.length < 10) {
                showNotification('Nomor telepon tidak valid. Minimal 10 digit.', 'warning');
                return;
            }

            // Disable checkout button to prevent double submission
            const checkoutBtn = document.getElementById('checkoutBtn');
            const originalText = checkoutBtn.innerHTML;
            checkoutBtn.disabled = true;
            checkoutBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';

            // Validate cart items
            const validatedCart = cart.filter(item => {
                return item.id && item.name && item.price > 0 && item.quantity > 0 && item.image;
            });

            if (validatedCart.length !== cart.length) {
                showNotification('Terdapat item tidak valid dalam keranjang.', 'error');
                checkoutBtn.disabled = false;
                checkoutBtn.innerHTML = originalText;
                return;
            }

            const orderData = {
                customer_name: customerName,
                customer_phone: customerPhone,
                table_number: tableNumber,
                notes: orderNotes,
                items: validatedCart,
                total_amount: validatedCart.reduce((sum, item) => sum + item.subtotal, 0)
            };

            // Debug: log cart items to check images
            console.log('Order data being sent:', orderData);
            validatedCart.forEach(item => {
                console.log(`Item: ${item.name}, Image: ${item.image || 'No image'}`);
            });

            // Send to server
            fetch('{{ route("order.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(orderData)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Clear cart
                        cart = [];
                        updateCart();

                        // Clear form
                        document.getElementById('checkoutForm').reset();

                        // Close modal
                        const cartModal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
                        cartModal.hide();

                        // Show success message
                        showNotification('Pesanan berhasil dibuat! Terima kasih.', 'success');
                        
                        // Redirect after short delay
                        setTimeout(() => {
                            window.location.href = `{{ url('/order/confirmation') }}/${data.order_id}`;
                        }, 1500);
                    } else {
                        showNotification('Terjadi kesalahan: ' + (data.message || 'Unknown error'), 'error');
                        checkoutBtn.disabled = false;
                        checkoutBtn.innerHTML = originalText;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.', 'error');
                    checkoutBtn.disabled = false;
                    checkoutBtn.innerHTML = originalText;
                });
        }

        // Enhanced category filtering with smooth transitions
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize cart
            initializeCart();
            updateCart();

            // Mobile detection
            const isMobile = window.innerWidth <= 768;
            const mobileCartBtn = document.getElementById('mobileCartBtn');
            const mobileCartCount = document.getElementById('mobileCartCount');
            const scrollToTopBtn = document.getElementById('scrollToTop');

            // Show mobile cart button on small screens
            if (isMobile) {
                mobileCartBtn.style.display = 'flex';
            }

            // Cart event listeners
            document.getElementById('clearCart').addEventListener('click', clearCart);
            document.getElementById('checkoutBtn').addEventListener('click', checkout);

            // Enhanced form validation
            const customerNameInput = document.getElementById('customerName');
            const customerPhoneInput = document.getElementById('customerPhone');
            
            if (customerNameInput) {
                customerNameInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^a-zA-Z\s]/g, ''); // Only letters and spaces
                    if (this.value.length > 50) {
                        this.value = this.value.slice(0, 50);
                    }
                });
            }

            if (customerPhoneInput) {
                customerPhoneInput.addEventListener('input', function() {
                    // Allow only numbers, spaces, +, -, (, )
                    this.value = this.value.replace(/[^\d\s\-\+\(\)]/g, '');
                    if (this.value.length > 15) {
                        this.value = this.value.slice(0, 15);
                    }
                });
            }

            // Add to cart button listeners with loading state
            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const price = parseFloat(this.dataset.price);
                    const description = this.dataset.description;
                    const image = this.dataset.image;
                    
                    // Add loading state
                    const originalText = this.innerHTML;
                    this.disabled = true;
                    this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Menambah...';
                    
                    // Simulate async operation
                    setTimeout(() => {
                        addToCart(id, name, price, description, image);
                        
                        // Restore button state
                        this.disabled = false;
                        this.innerHTML = originalText;
                        
                        // Scroll to top on mobile after adding to cart
                        if (isMobile) {
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        }
                    }, 300); // Small delay for better UX
                });
            });

            // Mobile cart functionality is now integrated in updateCart function

            // Scroll to top functionality
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.style.display = 'flex';
                } else {
                    scrollToTopBtn.style.display = 'none';
                }
            });

            scrollToTopBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Responsive adjustments
            window.addEventListener('resize', function() {
                const isMobileNow = window.innerWidth <= 768;
                if (isMobileNow) {
                    mobileCartBtn.style.display = 'flex';
                } else {
                    mobileCartBtn.style.display = 'none';
                }
            });

            const categoryButtons = document.querySelectorAll('.btn-category');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const menuContainer = document.getElementById('menuContainer');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Show loading
                    menuContainer.style.opacity = '0';
                    loadingSpinner.style.display = 'block';

                    // Update active state
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Simulate loading and redirect
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 300);
                });
            });

            // Add smooth scroll to top when page loads
            if (window.location.search.includes('category=')) {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            // Add hover effects to cards
            const menuCards = document.querySelectorAll('.menu-card');
            menuCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>