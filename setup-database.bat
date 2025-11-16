@echo off
echo ===================================
echo Setup Database Nusantara Ramen
echo ===================================

echo Menjalankan migration...
php artisan migrate --force

echo.
echo Menjalankan seeder...
php artisan db:seed --force

echo.
echo ===================================
echo Database berhasil di-setup!
echo ===================================
echo.
echo Login Credentials:
echo 1. Email: kasir@nusantararamen.com
echo    Password: admin123
echo.  
echo 2. Email: kasir2@nusantararamen.com
echo    Password: kasir123
echo ===================================

pause