@echo off
echo ============================================
echo  Property Agent - Setup Script
echo ============================================
echo.

echo [1/5] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install failed. Make sure PHP and Composer are installed.
    pause
    exit /b 1
)

echo [2/5] Copying .env file...
if not exist .env (
    copy .env.example .env
    echo .env file created. Please edit it with your database credentials.
) else (
    echo .env file already exists.
)

echo [3/5] Generating app key...
php artisan key:generate

echo [4/5] Running database migrations...
php artisan migrate

echo [5/5] Seeding sample data...
php artisan db:seed

echo.
echo ============================================
echo  Setup Complete!
echo  Run 'php artisan serve' to start
echo  Visit http://localhost:8000
echo ============================================
pause
