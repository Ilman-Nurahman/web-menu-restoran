<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - Nusantara Ramen</title>
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
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 0.75rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem 0;
            }

            .navbar-brand {
                font-size: 1.4rem;
            }

            .navbar .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.2rem;
                gap: 0.25rem;
            }

            .navbar .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }

        .confirmation-header {
            background: linear-gradient(135deg, var(--success-color) 0%, #2ecc71 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }

        .success-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .order-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .order-info {
            background: var(--light-gray);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .order-item {
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
            margin: 0;
            border-radius: 8px;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .order-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.6s ease;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item:hover {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #f8f9fa 100%);
            transform: translateY(-2px) scale(1.01);
            margin: -2px -0.5rem 2px;
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: #dee2e6;
        }

        .order-item:hover::before {
            left: 100%;
        }

        /* Add subtle pulse animation on hover */
        @keyframes pulseGlow {
            0% { box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); }
            50% { box-shadow: 0 12px 35px rgba(44, 62, 80, 0.15); }
            100% { box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); }
        }

        .order-item:hover {
            animation: pulseGlow 2s ease-in-out infinite;
        }

        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            z-index: 2;
        }

        .order-item:hover .item-image {
            transform: scale(1.1) rotate(2deg);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
        }

        .item-placeholder {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e9ecef;
            color: white;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .item-placeholder::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }

        .order-item:hover .item-placeholder {
            transform: scale(1.1) rotate(-2deg);
            box-shadow: 0 12px 30px rgba(44, 62, 80, 0.3);
            border-radius: 12px;
        }

        .order-item:hover .item-placeholder::before {
            width: 80px;
            height: 80px;
        }

        .loading-image {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #f0f0f0 25%, transparent 25%, transparent 75%, #f0f0f0 75%, #f0f0f0),
                        linear-gradient(45deg, #f0f0f0 25%, transparent 25%, transparent 75%, #f0f0f0 75%, #f0f0f0);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            border-radius: 8px;
            animation: shimmer 1.5s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .status-badge {
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #34495e 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
            color: white;
        }

        .btn-whatsapp {
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-whatsapp:hover {
            background: linear-gradient(135deg, #128c7e 0%, #25d366 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
            color: white;
        }

        .total-section {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-top: 1rem;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Item text animations */
        .item-title {
            transition: all 0.3s ease;
            position: relative;
        }

        .item-price {
            transition: all 0.3s ease;
            display: inline-block;
        }

        .item-quantity {
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .item-subtotal {
            transition: all 0.3s ease;
            position: relative;
        }

        .order-item:hover .item-title {
            color: var(--primary-color) !important;
            transform: translateX(5px);
        }

        .order-item:hover .item-price {
            color: var(--secondary-color) !important;
            transform: translateX(3px);
        }

        .order-item:hover .item-quantity {
            transform: scale(1.15) rotate(5deg);
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)) !important;
        }

        .order-item:hover .item-subtotal {
            transform: translateX(-5px) scale(1.05);
            color: var(--accent-color) !important;
        }

        /* Stagger animation delay for smooth effect */
        .item-title { transition-delay: 0.1s; }
        .item-price { transition-delay: 0.15s; }
        .item-quantity { transition-delay: 0.2s; }
        .item-subtotal { transition-delay: 0.25s; }

        @media (max-width: 768px) {
            .confirmation-header {
                padding: 1.5rem 0;
            }
            
            .success-icon {
                font-size: 2.5rem;
            }
            
            .order-card {
                padding: 1rem;
                margin-bottom: 1rem;
                border-radius: 10px;
            }

            .order-info {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .order-info .row .col-md-6 {
                margin-bottom: 0.75rem !important;
            }

            .order-item {
                padding: 0.75rem 0;
                border-radius: 6px;
            }

            .order-item:hover {
                transform: translateY(-1px) scale(1.005);
                padding: 1rem 0.5rem;
                margin: -1px -0.25rem 1px;
            }
            
            .order-item:hover .item-image,
            .order-item:hover .item-placeholder {
                transform: scale(1.05);
            }

            /* Mobile specific item layout - keep horizontal */
            .order-item .row {
                align-items: center !important;
                margin: 0 !important;
                display: flex !important;
                flex-wrap: nowrap !important;
            }

            .order-item .col-2 {
                flex: 0 0 18%;
                max-width: 18%;
                padding-right: 0.25rem;
            }

            .order-item .col-5 {
                flex: 0 0 42%;
                max-width: 42%;
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }

            .order-item .col-3 {
                flex: 0 0 20%;
                max-width: 20%;
                text-align: center;
                padding-left: 0.1rem;
                padding-right: 0.1rem;
            }

            .order-item .col-2:last-child {
                flex: 0 0 20%;
                max-width: 20%;
                text-align: right;
                padding-left: 0.1rem;
            }

            .item-title {
                font-size: 0.9rem !important;
                line-height: 1.2 !important;
                margin-bottom: 0.1rem !important;
            }

            .item-price {
                font-size: 0.7rem !important;
                line-height: 1.1 !important;
            }

            .item-quantity {
                padding: 0.2rem 0.4rem !important;
                font-size: 0.75rem !important;
                min-width: auto;
                border-radius: 10px !important;
            }

            .item-subtotal {
                font-size: 0.8rem !important;
                font-weight: 600 !important;
                line-height: 1.1 !important;
            }

            .small.text-muted {
                font-size: 0.65rem !important;
            }

            /* Button adjustments */
            .btn-primary-custom,
            .btn-whatsapp {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }

            /* Image/placeholder size for mobile */
            .item-image,
            .item-placeholder,
            .loading-image {
                width: 50px;
                height: 50px;
            }

            .total-section {
                padding: 1rem;
            }

            .total-section h4 {
                font-size: 1.1rem;
            }

            .total-section h3 {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .confirmation-header {
                padding: 1rem 0;
                margin-bottom: 1.5rem;
            }

            .success-icon {
                font-size: 2rem;
            }

            h1.display-4 {
                font-size: 1.8rem !important;
            }

            .lead {
                font-size: 0.95rem;
            }

            .order-card {
                padding: 0.75rem;
                margin-bottom: 0.75rem;
            }

            .order-info {
                padding: 0.75rem;
            }

            /* Keep horizontal layout but optimize for small screens */
            .order-item .row {
                display: flex;
                flex-wrap: nowrap;
                align-items: center !important;
                margin: 0;
            }

            .order-item .col-2,
            .order-item .col-5,
            .order-item .col-3,
            .order-item .col-2:last-child {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }

            /* Compact layout for very small screens */
            .order-item .col-2,
            .order-item .col-5,
            .order-item .col-3,
            .order-item .col-2:last-child {
                padding-left: 0.15rem;
                padding-right: 0.15rem;
            }

            /* Image column - minimal */
            .order-item .col-2 {
                flex: 0 0 15%;
                max-width: 15%;
            }

            /* Title column - maximum space */
            .order-item .col-5 {
                flex: 0 0 48%;
                max-width: 48%;
            }

            /* Quantity column - compact */
            .order-item .col-3 {
                flex: 0 0 18%;
                max-width: 18%;
                text-align: center;
            }

            /* Subtotal column - compact */
            .order-item .col-2:last-child {
                flex: 0 0 19%;
                max-width: 19%;
                text-align: right;
            }

            .order-item {
                padding: 0.5rem;
                border: 1px solid #eee;
                border-radius: 6px;
                margin-bottom: 0.4rem;
            }

            .order-item:hover {
                margin-bottom: 0.4rem;
                padding: 0.5rem;
            }

            /* Force horizontal layout - no wrapping */
            .order-item .row {
                display: flex !important;
                flex-wrap: nowrap !important;
                align-items: center !important;
                margin: 0 !important;
                width: 100% !important;
            }

            /* Prevent text wrapping issues */
            .item-title {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .item-price {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .item-title {
                font-size: 0.8rem !important;
                line-height: 1.1 !important;
                margin-bottom: 0.05rem !important;
            }

            .item-price {
                font-size: 0.65rem !important;
                line-height: 1 !important;
            }

            .item-quantity {
                padding: 0.15rem 0.3rem !important;
                font-size: 0.7rem !important;
                border-radius: 8px !important;
            }

            .item-subtotal {
                font-size: 0.75rem !important;
                line-height: 1 !important;
            }

            /* Image/placeholder size for very small mobile */
            .item-image,
            .item-placeholder,
            .loading-image {
                width: 40px !important;
                height: 40px !important;
            }

            .item-placeholder i {
                font-size: 1rem !important;
            }

            /* Better text readability */
            h6.text-muted {
                font-size: 0.8rem;
                font-weight: 600;
            }

            p.mb-0 {
                font-size: 0.9rem;
                line-height: 1.3;
            }

            .alert {
                font-size: 0.85rem;
                padding: 0.75rem;
            }

            /* Optimize spacing */
            .order-info .row > div {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            /* Footer adjustments */
            footer {
                margin-top: 2rem !important;
                padding: 1rem 0 !important;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('menu.index') }}">
                <i class="bi bi-bowl-hot"></i>
                Nusantara Ramen
            </a>
        </div>
    </nav>

    <section class="confirmation-header">
        <div class="container text-center">
            <div class="success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">Pesanan Berhasil!</h1>
            <p class="lead">Terima kasih {{ $order->customer_name }}, pesanan Anda telah kami terima.</p>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="order-card fade-in">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row">
                        <h3 class="mb-2 mb-md-0 text-center text-md-start">
                            <i class="bi bi-receipt me-2"></i>
                            Detail Pesanan
                        </h3>
                        <span class="status-badge">
                            <i class="bi bi-clock me-1"></i>
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="order-info">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-3">
                                <h6 class="text-muted mb-1">Nomor Pesanan</h6>
                                <p class="mb-0 fw-bold">#{{ str_pad($order->id ?? 0, 6, '0', STR_PAD_LEFT) }}</p>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <h6 class="text-muted mb-1">Tanggal Pesanan</h6>
                                <p class="mb-0">{{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'N/A' }} WIB</p>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <h6 class="text-muted mb-1">Nama Pelanggan</h6>
                                <p class="mb-0">{{ $order->customer_name }}</p>
                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <h6 class="text-muted mb-1">Nomor Telepon</h6>
                                <p class="mb-0">{{ $order->customer_phone }}</p>
                            </div>
                            @if($order->notes)
                            <div class="col-12 mb-3">
                                <h6 class="text-muted mb-1">Catatan Pesanan</h6>
                                <p class="mb-0">{{ $order->notes }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <h5 class="mb-3">
                        <i class="bi bi-list-ul me-2"></i>
                        Item Pesanan ({{ $order->orderItems ? $order->orderItems->count() : 0 }} items)
                    </h5>
                    
                    @if(config('app.debug') && $order->orderItems)
                    <div class="alert alert-info small mb-3">
                        <strong>Debug Info:</strong> 
                        @foreach($order->orderItems as $debugItem)
                            {{ $debugItem->menu_name }} - Image: {{ $debugItem->menu_image ? 'Available' : 'Missing' }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                    @endif
                    
                    @if(isset($order->orderItems) && $order->orderItems->count() > 0)
                    @foreach($order->orderItems as $item)
                    <div class="order-item">
                        <div class="row align-items-center no-gutters">
                            <div class="col-2 pe-2">
                                @if(isset($item->menu_image) && $item->menu_image)
                                    <div class="position-relative">
                                        <div class="loading-image position-absolute" id="loading-{{ $loop->index }}"></div>
                                        <img src="{{ $item->menu_image }}" 
                                             alt="{{ $item->menu_name }}" 
                                             class="item-image"
                                             loading="lazy"
                                             onload="document.getElementById('loading-{{ $loop->index }}').style.display='none'"
                                             onerror="this.onerror=null; this.style.display='none'; this.parentNode.innerHTML='<div class=\'item-placeholder\'><i class=\'bi bi-image\' style=\'font-size: 1.2rem;\'></i></div>';">
                                    </div>
                                @else
                                    <div class="item-placeholder">
                                        <i class="bi bi-bowl-hot" style="font-size: 1.2rem;"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-5 ps-1">
                                <div class="item-title fw-bold text-dark mb-0">{{ $item->menu_name ?? 'Menu Item' }}</div>
                                <small class="text-muted item-price d-block">
                                    Rp {{ number_format($item->menu_price ?? 0, 0, ',', '.') }}
                                </small>
                            </div>
                            <div class="col-3 text-center px-1">
                                <span class="badge bg-primary item-quantity d-inline-block">
                                    x{{ $item->quantity }}
                                </span>
                            </div>
                            <div class="col-2 text-end ps-1">
                                <div class="fw-bold text-success item-subtotal small">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Tidak ada item pesanan yang ditemukan.
                    </div>
                    @endif

                    <div class="total-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Total Pembayaran</h4>
                            <h3 class="mb-0 fw-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="order-card fade-in">
                    <h5 class="mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        Informasi Selanjutnya
                    </h5>
                    
                    <div class="alert alert-info">
                        <i class="bi bi-lightbulb me-2"></i>
                        <strong>Tim kami akan segera menghubungi Anda</strong><br>
                        Pesanan akan diproses dalam waktu 15-30 menit. Anda akan mendapat konfirmasi melalui WhatsApp.
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <a href="{{ route('menu.index') }}" class="btn btn-primary-custom w-100">
                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali ke Menu
                            </a>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <a href="https://wa.me/6281234567890?text=Halo, saya ingin menanyakan pesanan #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}" 
                               class="btn btn-whatsapp w-100" target="_blank">
                                <i class="bi bi-whatsapp me-2"></i>
                                Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 py-4" style="background-color: var(--primary-color); color: white;">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Nusantara Ramen. Dibuat dengan ❤️ untuk pecinta ramen.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add fade-in animation on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.order-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('fade-in');
                }, index * 200);
            });

            // Enhanced hover interactions
            const orderItems = document.querySelectorAll('.order-item');
            orderItems.forEach((item, index) => {
                // Staggered entrance animation
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100 + 500);

                // Add custom ripple effect on click
                item.addEventListener('click', function(e) {
                    const ripple = document.createElement('div');
                    ripple.className = 'ripple-effect';
                    
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(44, 62, 80, 0.1);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        left: ${x - 10}px;
                        top: ${y - 10}px;
                        width: 20px;
                        height: 20px;
                        pointer-events: none;
                        z-index: 1;
                    `;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });

                // Smooth hover sound effect (visual)
                item.addEventListener('mouseenter', function() {
                    this.style.setProperty('--hover-scale', '1.01');
                });

                item.addEventListener('mouseleave', function() {
                    this.style.setProperty('--hover-scale', '1');
                });
            });
        });

        // Mobile detection and adjustments
        const isMobile = window.innerWidth <= 768;
        const isSmallMobile = window.innerWidth <= 576;

        // Add CSS animation for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .order-item {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }
        `;
        document.head.appendChild(style);

        // Optimize for mobile
        if (isMobile) {
            // Disable hover animations on mobile for better performance
            const orderItems = document.querySelectorAll('.order-item');
            orderItems.forEach(item => {
                item.addEventListener('touchstart', function() {
                    this.style.background = 'rgba(248, 249, 250, 0.7)';
                });
                
                item.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.style.background = '';
                    }, 200);
                });
            });

            // Add viewport meta adjustment for better scaling
            const viewport = document.querySelector('meta[name="viewport"]');
            if (viewport && isSmallMobile) {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');
            }
        }

        // Handle orientation change
        window.addEventListener('orientationchange', function() {
            setTimeout(() => {
                window.scrollTo(0, 0);
            }, 500);
        });
    </script>
</body>
</html>