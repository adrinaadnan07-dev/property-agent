@echo off
title Property Agent Site
cd /d "%~dp0"
echo ============================================
echo  Property Agent - Starting Server
echo ============================================
echo.
echo  Site: http://localhost:8000
echo  Admin: http://localhost:8000/admin
echo.
echo  Press Ctrl+C to stop the server
echo ============================================
echo.
php artisan serve --host=0.0.0.0 --port=8000
pause
