@echo off
echo ===================================
echo Debug & Fix Order Issues
echo ===================================

echo Step 1: Clear all cache...
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo.
echo Step 2: Check database structure...
php artisan migrate:status

echo.
echo Step 3: Refresh autoloader...
composer dump-autoload

echo.
echo ===================================
echo Debug completed!
echo ===================================
echo.
echo Now try to access order confirmation again.
echo If error persists, check Laravel logs at storage/logs/
echo ===================================

pause