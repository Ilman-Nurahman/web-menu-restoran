# 🍜 Nusantara Ramen - Sistem Manajemen Restoran

Aplikasi manajemen restoran lengkap dengan fitur menu, keranjang belanja, order management, dan dashboard analytics.

## ✨ Fitur Utama

### 🎯 **Menu & Ordering**
- **Menu Responsif**: Tampilan menu yang elegant dan mobile-friendly
- **Keranjang Belanja**: Sistem keranjang dengan localStorage
- **Order System**: Proses pemesanan dengan validasi lengkap
- **Konfirmasi Order**: Halaman konfirmasi dengan detail pesanan

### 🔐 **Sistem Autentikasi**
- **Login Kasir**: Login terintegrasi dengan database
- **Role-based Access**: Middleware untuk proteksi route kasir
- **Session Management**: Sistem session Laravel yang aman

### 📊 **Dashboard Analytics**
- **Omset Harian**: Card summary pendapatan hari ini
- **Chart Bulanan**: Grafik omset 12 bulan terakhir (Chart.js)
- **Menu Terlaris**: Daftar menu paling populer hari ini
- **Real-time Updates**: Auto-refresh data

### 📋 **Order Management**
- **List Order**: Table responsive semua pesanan customer
- **Detail Order**: View lengkap dengan items dan status
- **Filter & Search**: Pagination dan pencarian
- **Status Tracking**: Status pesanan dengan badge

## 🚀 Instalasi & Setup

### 1. **Prerequisites**
- PHP 8.1+
- Composer
- MySQL/MariaDB
- Node.js (opsional untuk frontend assets)

### 2. **Clone Repository**
```bash
git clone [repository-url]
cd menu-restoran
```

### 3. **Install Dependencies**
```bash
composer install
```

### 4. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

### 5. **Database Configuration**
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=menu_restoran
DB_USERNAME=root
DB_PASSWORD=
```

### 6. **Setup Database** (Windows)
```bash
# Jalankan setup otomatis
setup-database.bat
```

### 6. **Setup Database** (Manual)
```bash
# Buat database
CREATE DATABASE menu_restoran;

# Jalankan migration
php artisan migrate

# Jalankan seeder
php artisan db:seed
```

### 7. **Jalankan Server**
```bash
php artisan serve
```

Aplikasi dapat diakses di: `http://localhost:8000`

## 👥 Login Credentials

### **Kasir 1**
- **Email**: `kasir@nusantararamen.com`
- **Password**: `admin123`

### **Kasir 2**  
- **Email**: `kasir2@nusantararamen.com`
- **Password**: `kasir123`

## 📱 Cara Penggunaan

### **Untuk Customer**
1. **Browse Menu**: Kunjungi `/menu` untuk melihat daftar menu
2. **Add to Cart**: Klik "Tambah ke Keranjang" pada menu yang diinginkan
3. **Checkout**: Klik ikon keranjang dan isi form pemesanan
4. **Konfirmasi**: Lihat detail pesanan di halaman konfirmasi

### **Untuk Kasir**
1. **Login**: Klik "Login Kasir" dan masukkan credentials
2. **Dashboard**: Akses `/dashboard` untuk melihat analytics
3. **Order Management**: Lihat semua pesanan di `/dashboard/orders`
4. **Logout**: Gunakan dropdown menu untuk logout

## 🎨 Teknologi yang Digunakan

### **Backend**
- **Laravel 10**: PHP Framework
- **MySQL**: Database
- **Laravel Auth**: Autentikasi
- **Eloquent ORM**: Database modeling

### **Frontend**
- **Bootstrap 5**: UI Framework
- **Bootstrap Icons**: Icon library
- **Chart.js**: Charting library
- **Vanilla JavaScript**: Interactive features
- **LocalStorage API**: Cart persistence

### **Features**
- **Responsive Design**: Mobile-first approach
- **Progressive Enhancement**: Graceful degradation
- **RESTful API**: Clean API endpoints
- **Security**: CSRF protection, SQL injection prevention
- **Performance**: Optimized queries, eager loading

## 📊 Database Schema

### **Tables**
- `users` - Data kasir dengan role
- `categories` - Kategori menu 
- `menus` - Item menu dengan kategori
- `orders` - Pesanan customer
- `order_items` - Detail item dalam pesanan

### **Relationships**
- Categories → Menus (One-to-Many)
- Orders → OrderItems (One-to-Many)
- Menus → OrderItems (One-to-Many)

## 🔧 Kustomisasi

### **Menambah Menu**
1. Edit `database/seeders/MenuSeeder.php`
2. Jalankan `php artisan db:seed --class=MenuSeeder`

### **Styling**
- CSS custom ada di view files
- Warna utama bisa diubah di CSS variables

### **Dashboard Metrics**
- Edit `app/Http/Controllers/DashboardController.php`
- Tambah metric baru sesuai kebutuhan

## 🐛 Troubleshooting

### **🔥 Error "Column not found: menus.image"**
Jalankan script fix database:
```bash
# Windows
fix-database.bat

# Manual
php artisan migrate:fresh --seed
php artisan config:clear
```

### **Migration Error**
```bash
php artisan migrate:fresh --seed
```

### **Database Connection Error**
1. Pastikan MySQL/MariaDB running
2. Check konfigurasi `.env`
3. Buat database `menu_restoran`

### **Permission Error** (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

### **Clear Cache**
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

### **Login Error**
1. Pastikan migration dan seeder sudah dijalankan
2. Check credentials di README
3. Pastikan role 'kasir' sudah ada di database

## 📄 License

Open source project untuk pembelajaran dan development.

## 🤝 Contributing

Kontribusi selalu welcome! Silakan fork repository dan buat pull request.

## 📞 Support

Untuk pertanyaan atau bantuan, silakan buat issue di repository ini.