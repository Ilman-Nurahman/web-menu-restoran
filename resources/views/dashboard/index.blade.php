<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - Nusantara Ramen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #f39c12;
            --success-color: #27ae60;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray);
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .main-container {
            margin-top: 76px;
        }

        .sidebar {
            background: white;
            min-height: calc(100vh - 76px);
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 76px;
        }

        .sidebar .nav-link {
            color: var(--dark-gray);
            padding: 1rem 1.5rem;
            border-radius: 0;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover {
            background: var(--light-gray);
            color: var(--primary-color);
            border-left-color: var(--secondary-color);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, var(--light-gray), white);
            color: var(--secondary-color);
            border-left-color: var(--secondary-color);
            font-weight: 600;
        }

        .main-content {
            padding: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        }

        .stats-card .card-body {
            padding: 2rem;
        }

        .stats-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1.5rem;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--dark-gray);
            font-weight: 500;
            font-size: 1.1rem;
        }

        .chart-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .chart-card .card-header {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            border: none;
            padding: 1.5rem 2rem;
        }

        .chart-card .card-body {
            height: 500px; /* Fixed height for chart */
        }

        .menu-terlaris-card .card-body {
            height: 500px; /* Same height as chart */
            overflow-y: auto; /* Enable scrolling */
            padding: 1.5rem;
        }

        .menu-terlaris-card .card-body::-webkit-scrollbar {
            width: 8px;
        }

        .menu-terlaris-card .card-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .menu-terlaris-card .card-body::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 10px;
        }

        .menu-terlaris-card .card-body::-webkit-scrollbar-thumb:hover {
            background: #c0392b;
        }

        .top-menu-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: var(--light-gray);
            border-radius: 15px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .top-menu-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .top-menu-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 1rem;
        }

        .badge-custom {
            background: linear-gradient(135deg, var(--secondary-color), #c0392b);
            color: white;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                position: relative;
                top: auto;
            }

            .main-container {
                margin-top: 76px; /* Keep margin for mobile too */
            }

            .main-content {
                padding: 1rem;
            }

            .stats-card .card-body {
                padding: 1.5rem;
            }

            .stats-number {
                font-size: 2rem;
            }

            .stats-icon {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }

            .chart-card .card-body {
                height: 300px; /* Smaller height on mobile */
            }

            .menu-terlaris-card .card-body {
                height: 300px; /* Smaller height on mobile */
            }

            .top-menu-item {
                padding: 0.75rem;
            }

            .top-menu-image {
                width: 50px;
                height: 50px;
            }
        }

        .welcome-section {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            opacity: 0.9;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-bowl-hot me-2"></i>
                Nusantara Ramen - Dashboard
            </a>
            
            <div class="navbar-nav ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="{{ route('menu.index') }}" class="dropdown-item">
                                <i class="bi bi-house me-2"></i>
                                Ke Menu Utama
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
            </div>
        </div>
    </nav>

    <!-- Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
        <div class="container-fluid">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endif

    <div class="container-fluid main-container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('dashboard.orders') }}">
                            <i class="bi bi-list-ul me-2"></i>
                            Order Customer
                        </a>
                        <a class="nav-link" href="{{ route('menu.index') }}">
                            <i class="bi bi-house me-2"></i>
                            Menu Utama
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    <!-- Welcome Section -->
                    <div class="welcome-section">
                        <h1 class="welcome-title">
                            <i class="bi bi-emoji-smile me-2"></i>
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h1>
                        <p class="welcome-subtitle">
                            {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }} - 
                            Dashboard Manajemen Restoran
                        </p>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-lg-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body text-center">
                                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, var(--success-color), #229954);">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="stats-number">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</div>
                                    <div class="stats-label">Omset Hari Ini</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 mb-4">
                            <div class="card stats-card">
                                <div class="card-body text-center">
                                    <div class="stats-icon mx-auto" style="background: linear-gradient(135deg, var(--secondary-color), #c0392b);">
                                        <i class="bi bi-receipt"></i>
                                    </div>
                                    <div class="stats-number">{{ $todayOrders }}</div>
                                    <div class="stats-label">Order Hari Ini</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Revenue Chart -->
                        <div class="col-lg-8 mb-4">
                            <div class="card chart-card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-bar-chart me-2"></i>
                                        Omset Per Bulan (12 Bulan Terakhir)
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="revenueChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Top Menu Items -->
                        <div class="col-lg-4 mb-4">
                            <div class="card chart-card menu-terlaris-card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-trophy me-2"></i>
                                        Menu Terlaris Hari Ini
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @forelse($topMenus as $menu)
                                    <div class="top-menu-item">
                                        <img src="{{ $menu->image }}" 
                                             alt="{{ $menu->name }}" 
                                             class="top-menu-image"
                                             onerror="this.src='{{ asset('image-not-found.jpg') }}'">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $menu->name }}</h6>
                                            <small class="text-muted">{{ $menu->total_quantity }} porsi</small>
                                        </div>
                                        <span class="badge badge-custom">{{ $menu->total_quantity }}</span>
                                    </div>
                                    @empty
                                    <div class="text-center text-muted py-4">
                                        <i class="bi bi-inbox display-4"></i>
                                        <p class="mt-2">Belum ada pesanan hari ini</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const chartData = @json($chartData);
        const chartLabels = @json($chartLabels);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Omset (Rp)',
                    data: chartData,
                    borderColor: '#e74c3c',
                    backgroundColor: 'rgba(231, 76, 60, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#e74c3c',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 8
                    }
                }
            }
        });

        // Auto refresh setiap 5 menit
        setInterval(function() {
            location.reload();
        }, 300000);
    </script>
</body>

</html>