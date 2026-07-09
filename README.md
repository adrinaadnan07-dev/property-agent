# Property Agent Landing Page

A complete Laravel-based landing page system for property agents. Features project listings, salary calculator, WhatsApp integration, and admin panel.

## Features

- **Main Landing Page** with hero section, featured projects, and CTA
- **New Projects Page** – list affordable housing / new launch projects
- **Landed Properties Page** – list landed terrace, bungalow, semi-D properties
- **Salary Calculator** – check loan eligibility by DSR (Debt Service Ratio)
- **WhatsApp Integration** – one-click inquiry via WhatsApp with pre-filled details
- **Admin Panel** – manage projects, view inquiries, update statuses
- **Share Buttons** – WhatsApp, Facebook, Telegram sharing

## Requirements

- PHP 8.1+
- Composer 2.x
- MySQL / MariaDB
- Node.js (for asset building, optional)

## Installation

### 1. Install Laravel dependencies

```bash
composer install
```

### 2. Environment setup

```bash
copy .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```
DB_DATABASE=property_agent
DB_USERNAME=root
DB_PASSWORD=yourpassword

AGENT_NAME="Your Name"
AGENT_PHONE="60123456789"
AGENT_EMAIL="agent@example.com"
AGENT_COMPANY="Your Agency Name"
```

### 3. Create database

Create a MySQL database named `property_agent` (or your chosen name).

### 4. Run migrations and seed data

```bash
php artisan migrate
php artisan db:seed
```

### 5. Start development server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

### 6. Admin panel

Admin panel is available at `/admin` (e.g. `http://localhost:8000/admin`).

For production, add authentication middleware to the admin routes.

## Salary Calculator Logic

The calculator uses Malaysian banking standard:
- **Loan Amount:** 90% of property price
- **Interest Rate:** 4% per annum
- **Tenure:** 35 years maximum
- **DSR Limit:** 70% (monthly installment ≤ 70% of monthly salary)
- **Minimum Salary:** RM 2,000

## Deployment

### Hosting options (Malaysia-friendly):
1. **Shared hosting** (Exabytes, Shinjiru, Hostgator) – upload via cPanel
2. **VPS** (DigitalOcean, Vultr, Cloud Senate)
3. **Laravel Forge** – managed deployment

### Steps for shared hosting:
1. Zip the project (exclude `vendor`, `node_modules`)
2. Upload to hosting via cPanel File Manager
3. Run `composer install --optimize-autoloader --no-dev`
4. Set up database via cPanel MySQL Wizard
5. Update `.env` with production settings
6. Run `php artisan migrate` and `php artisan db:seed`

### Steps for VPS:
1. Clone repo on server
2. Run `composer install --optimize-autoloader --no-dev`
3. Set up database
4. Run migrations and seed
5. Point domain to `public/` directory

## Cost Estimates (Malaysia)

| Item | Estimated Cost |
|------|---------------|
| Domain (.com / .my) | RM 40-60 / year |
| Shared hosting | RM 10-30 / month |
| VPS (DigitalOcean) | RM 20-50 / month |
| SSL Certificate | Free (Let's Encrypt) |

## Customization

- **Colors & styling:** Edit `public/css/app.css` CSS variables
- **Agent details:** Update `.env` file
- **Calculator parameters:** Edit `app/Http/Controllers/InquiryController.php`
- **Add more project types:** Update `type` field in migrations and controllers

## License

Private use. Developed for property agents.
