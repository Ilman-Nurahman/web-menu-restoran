<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Customer - Nusantara Ramen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        .page-header {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--dark-gray);
            font-size: 1.1rem;
        }

        .orders-table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-responsive-horizontal {
            overflow-x: auto;
            overflow-y: visible;
            border-radius: 20px;
            -webkit-overflow-scrolling: touch;
            position: relative;
        }

        /* Custom scrollbar */
        .table-responsive-horizontal::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive-horizontal::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive-horizontal::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 10px;
        }

        .table-responsive-horizontal::-webkit-scrollbar-thumb:hover {
            background: #c0392b;
        }

        .table-responsive-horizontal.scrollable::after {
            opacity: 1;
        }

        .table-fixed {
            min-width: 1300px;
            table-layout: fixed;
        }

        .table {
            margin-bottom: 0;
        }

        /* Fixed column widths */
        .table-fixed th:nth-child(1),
        .table-fixed td:nth-child(1) {
            width: 60px;
            /* No */
            position: sticky;
            left: 0;
            z-index: 10;
        }

        .table-fixed td:nth-child(1) {
            background: white;
            border-right: 2px solid #e9ecef;
        }

        .table-fixed th:nth-child(2),
        .table-fixed td:nth-child(2) {
            width: 150px;
            /* Order ID */
            position: sticky;
            left: 60px;
            z-index: 10;
        }

        .table-fixed td:nth-child(2) {
            background: white;
            border-right: 2px solid #e9ecef;
        }

        .table-fixed th:nth-child(3),
        .table-fixed td:nth-child(3) {
            width: 180px;
            /* Customer */
        }

        .table-fixed th:nth-child(4),
        .table-fixed td:nth-child(4) {
            width: 100px;
            /* Meja */
        }

        .table-fixed th:nth-child(5),
        .table-fixed td:nth-child(5) {
            width: 250px;
            /* Items */
        }

        .table-fixed th:nth-child(6),
        .table-fixed td:nth-child(6) {
            width: 160px;
            /* Total */
        }

        .table-fixed th:nth-child(7),
        .table-fixed td:nth-child(7) {
            width: 140px;
            /* Status */
        }

        .table-fixed th:nth-child(8),
        .table-fixed td:nth-child(8) {
            width: 240px;
            /* Aksi */
            position: sticky;
            right: 0;
            z-index: 10;
        }

        .table-fixed td:nth-child(8) {
            background: white;
            border-left: 2px solid #e9ecef;
        }

        .table th {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            font-weight: 600;
            padding: 1.5rem 1rem;
            border: none;
            position: sticky;
            top: 0;
            z-index: 5;
        }

        /* Sticky header columns override */
        .table-fixed th:nth-child(1),
        .table-fixed th:nth-child(2),
        .table-fixed th:nth-child(8) {
            z-index: 15;
            background: linear-gradient(135deg, var(--primary-color), #34495e) !important;
        }

        /* Shadow effect for sticky columns */
        .table-fixed td:nth-child(1):after,
        .table-fixed th:nth-child(1):after {
            content: '';
            position: absolute;
            top: 0;
            right: -2px;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.1), transparent);
            pointer-events: none;
        }

        .table-fixed td:nth-child(2):after,
        .table-fixed th:nth-child(2):after {
            content: '';
            position: absolute;
            top: 0;
            right: -2px;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.1), transparent);
            pointer-events: none;
        }

        .table-fixed td:nth-child(8):before,
        .table-fixed th:nth-child(8):before {
            content: '';
            position: absolute;
            top: 0;
            left: -8px;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to left, rgba(0, 0, 0, 0.1), transparent);
            pointer-events: none;
        }

        .table td {
            padding: 1.5rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #eee;
        }

        .table tbody tr {
            transition: none;
        }

        .table-pending {
            background-color: #f8f9fa !important;
        }

        /* Pending background for sticky columns */
        .table-pending td:nth-child(1),
        .table-pending td:nth-child(2),
        .table-pending td:nth-child(8) {
            background-color: #f8f9fa !important;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .order-items-compact {
            min-width: 150px;
        }

        .items-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .items-detail {
            background: var(--light-gray);
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #e9ecef;
        }

        .item-compact {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.25rem 0;
            border-bottom: 1px solid #f1f3f4;
            font-size: 0.85rem;
        }

        .item-compact:last-child {
            border-bottom: none;
        }

        .item-compact .item-name {
            flex-grow: 1;
            font-weight: 500;
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .item-compact .item-qty {
            margin-right: 0.5rem;
        }

        .item-compact .item-price {
            font-size: 0.8rem;
        }

        .total-amount {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--success-color);
        }

        .action-buttons {
            display: flex;
            gap: 0.375rem;
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-view {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
        }

        .btn-view:hover {
            background: linear-gradient(135deg, #2980b9, #3498db);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
        }

        .btn-complete {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            border: none;
        }

        .btn-complete:hover {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(46, 204, 113, 0.3);
            color: white;
        }



        .pagination-section {
            border-top: 1px solid #eee;
            background: #fff;
            padding: 1.5rem 2rem;
        }

        .pagination-info {
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .pagination-sm .page-link {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 6px;
            margin: 0 2px;
            border: 1px solid #dee2e6;
        }

        .pagination-sm .page-item.active .page-link {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        .pagination-sm .page-link:hover {
            background-color: var(--light-gray);
            border-color: #adb5bd;
            color: var(--primary-color);
        }

        .pagination-sm .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--dark-gray);
        }

        .empty-icon {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                position: relative;
                top: auto;
            }

            .main-container {
                margin-top: 76px;
                /* Keep margin for mobile too */
            }

            .main-content {
                padding: 1rem;
            }

            .page-header {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .table th,
            .table td {
                padding: 0.75rem 0.5rem;
                font-size: 0.9rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
            }

            .items-summary {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .item-compact {
                flex-direction: column;
                align-items: flex-start;
                padding: 0.5rem 0;
            }

            /* Mobile scroll adjustments */
            .table-fixed {
                min-width: 1000px;
                /* Smaller min-width for mobile */
            }

            .pagination-section {
                padding: 1rem;
            }

            .pagination-info {
                font-size: 0.8rem;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>

<body>
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
                        <li>
                            <hr class="dropdown-divider">
                        </li>
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

    <div class="container-fluid main-container">
        <div class="row">

            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                        <a class="nav-link active" href="{{ route('dashboard.orders') }}">
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

            <div class="col-md-9 col-lg-10">
                <div class="main-content">
                    <div class="page-header">
                        <h1 class="page-title">
                            <i class="bi bi-list-ul me-2"></i>
                            Order Customer
                        </h1>
                        <p class="page-subtitle">
                            Kelola dan pantau semua pesanan dari customer
                        </p>
                    </div>

                    <div class="orders-table-container">
                        @if($orders->count() > 0)
                        <div class="table-responsive-horizontal">
                            <table class="table table-fixed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th class="text-center">Meja</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr class="{{ $order->status == 'pending' ? 'table-pending' : '' }}">
                                        <td class="text-center">
                                            {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}
                                        </td>
                                        <td>
                                            <strong>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ $order->customer_name }}</strong><br>
                                            <small class="text-muted">{{ $order->customer_phone }}</small>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-primary">Meja {{ $order->table_number ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <div class="order-items-compact">
                                                <div class="items-summary">
                                                    <strong>{{ $order->orderItems->count() }} Item{{ $order->orderItems->count() > 1 ? 's' : '' }}</strong>
                                                    <button type="button" class="btn btn-sm btn-outline-primary ms-2"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#items-{{ $order->id }}"
                                                        aria-expanded="false">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </button>
                                                </div>

                                                <div class="collapse mt-2" id="items-{{ $order->id }}">
                                                    <div class="items-detail">
                                                        @foreach($order->orderItems as $item)
                                                        <div class="item-compact">
                                                            <span class="item-name">{{ $item->menu_name }}</span>
                                                            <span class="item-qty badge bg-secondary">{{ $item->quantity }}x</span>
                                                            <span class="item-price text-muted">Rp {{ number_format($item->menu_price * $item->quantity, 0, ',', '.') }}</span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="total-amount">
                                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="status-badge status-{{ $order->status }}">
                                                @if($order->status == 'pending')
                                                <i class="bi bi-clock me-1"></i>Pending
                                                @elseif($order->status == 'completed')
                                                <i class="bi bi-check-circle me-1"></i>Selesai
                                                @else
                                                <i class="bi bi-x-circle me-1"></i>Dibatalkan
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="action-buttons justify-content-center">
                                                <a href="{{ route('order.confirmation', $order->id) }}"
                                                    class="btn btn-action btn-view">
                                                    <i class="bi bi-eye me-1"></i>Lihat
                                                </a>
                                                @if($order->status == 'pending')
                                                <button onclick="updateOrderStatus({{ $order->id }})"
                                                    class="btn btn-action btn-complete">
                                                    <i class="bi bi-check-circle me-1"></i>Selesai
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination-section">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="pagination-info text-muted">
                                        Menampilkan {{ $orders->firstItem() ?? 0 }} - {{ $orders->lastItem() ?? 0 }}
                                        dari {{ $orders->total() }} total pesanan
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($orders->hasPages())
                                    <nav aria-label="Pagination Navigation">
                                        <ul class="pagination pagination-sm justify-content-end mb-0">
                                            {{-- Previous Page Link --}}
                                            @if ($orders->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">« Sebelumnya</span></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{ $orders->previousPageUrl() }}">« Sebelumnya</a></li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                            @if ($page == $orders->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($orders->hasMorePages())
                                            <li class="page-item"><a class="page-link" href="{{ $orders->nextPageUrl() }}">Selanjutnya »</a></li>
                                            @else
                                            <li class="page-item disabled"><span class="page-link">Selanjutnya »</span></li>
                                            @endif
                                        </ul>
                                    </nav>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="empty-state">
                            <i class="bi bi-inbox empty-icon"></i>
                            <h4>Belum Ada Pesanan</h4>
                            <p>Pesanan dari customer akan ditampilkan di sini</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmStatusModal" tabindex="-1" aria-labelledby="confirmStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-primary" id="confirmStatusModalLabel">
                        <i class="bi bi-check-circle me-2"></i>Konfirmasi Status
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-question-circle-fill text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h6 class="mb-2">Yakin ingin menandai pesanan ini sebagai selesai?</h6>
                    <p class="text-muted mb-0">Order ID: <span id="orderIdDisplay" class="fw-bold">#0000</span></p>
                    <p class="text-muted">Status akan berubah dari <span class="badge bg-warning">Pending</span> menjadi <span class="badge bg-success">Selesai</span></p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Batal
                    </button>
                    <button type="button" class="btn btn-success px-4" id="confirmCompleteBtn">
                        <i class="bi bi-check-circle me-1"></i>Ya, Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    </div>
                    <h6 class="mb-2">Berhasil!</h6>
                    <p class="text-muted mb-0">Pesanan telah ditandai sebagai selesai</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto refresh setiap 30 detik
        setInterval(function() {
            location.reload();
        }, 30000);

        // Smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Variables untuk modal
        let currentOrderId = null;
        let currentButton = null;
        let originalButtonText = '';

        // Function untuk show modal konfirmasi
        function updateOrderStatus(orderId) {
            currentOrderId = orderId;
            currentButton = event.target;
            originalButtonText = currentButton.innerHTML;
            // Update order ID di modal
            document.getElementById('orderIdDisplay').textContent = `#${String(orderId).padStart(4, '0')}`;
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('confirmStatusModal'));
            modal.show();
        }

        // Function untuk proses update status
        function processStatusUpdate() {
            if (!currentOrderId || !currentButton) return;

            // Disable button dan update text
            currentButton.disabled = true;
            currentButton.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Memproses...';

            // Hide confirm modal
            const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmStatusModal'));
            confirmModal.hide();

            fetch(`/dashboard/orders/${currentOrderId}/complete`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success modal
                        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                        // Auto close success modal dan reload
                        setTimeout(() => {
                            successModal.hide();
                            location.reload();
                        }, 1500);
                    } else {
                        alert('Error: ' + data.message);
                        // Restore button
                        currentButton.disabled = false;
                        currentButton.innerHTML = originalButtonText;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memperbarui status');
                    // Restore button
                    currentButton.disabled = false;
                    currentButton.innerHTML = originalButtonText;
                });
        }

        // Function untuk mendeteksi horizontal scroll
        function initTableScroll() {
            const tableContainer = document.querySelector('.table-responsive-horizontal');
            if (tableContainer) {
                function checkScrollable() {
                    const isScrollable = tableContainer.scrollWidth > tableContainer.clientWidth;
                    tableContainer.classList.toggle('scrollable', isScrollable);
                }

                // Check on load and resize
                checkScrollable();
                window.addEventListener('resize', checkScrollable);

                // Add scroll indicator
                tableContainer.addEventListener('scroll', function() {
                    const isAtEnd = tableContainer.scrollLeft >= (tableContainer.scrollWidth - tableContainer.clientWidth - 5);
                    tableContainer.classList.toggle('at-end', isAtEnd);
                });
            }
        }

        // Initialize on document ready
        document.addEventListener('DOMContentLoaded', function() {
            initTableScroll();
            // Event listener untuk tombol konfirmasi
            document.getElementById('confirmCompleteBtn').addEventListener('click', processStatusUpdate);
            // Reset variables saat modal ditutup
            document.getElementById('confirmStatusModal').addEventListener('hidden.bs.modal', function() {
                currentOrderId = null;
                currentButton = null;
                originalButtonText = '';
            });
        });
    </script>
</body>

</html>