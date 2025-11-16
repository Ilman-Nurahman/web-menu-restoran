@echo off
echo ===================================
echo Fixing Database Issues...
echo ===================================

echo Step 1: Refreshing migrations...
php artisan migrate:fresh --force

echo.
echo Step 2: Running seeders...
php artisan db:seed --force

echo.
echo Step 3: Clearing cache...
php artisan config:clear
php artisan cache:clear
php artisan route:clear

echo.
echo ===================================
echo Database fixed successfully!
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