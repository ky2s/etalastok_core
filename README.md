# etalastok_core

# SaaS Multi-Tenant App for Laundry & POS

A Laravel-based SaaS application designed to serve multiple businesses, such as laundry services and point-of-sale (POS) systems. This system supports multi-tenancy, subscription-based plans, and extensibility for different types of business operations.

## 🔧 Features

- Multi-tenant architecture (1 user can own/manage multiple tenants)
- Modular support for different business types (Laundry, POS, etc.)
- Subscription and package management with payment tracking
- Role-based access per tenant (e.g., owner, staff)
- Custom database credentials per tenant
- Extensible package limits (user count, transaction limits, etc.)

## 🧱 Database Structure

Key tables:

- `users` - Global users who can register and log in
- `packages` - Subscription plans with pricing and limits
- `subscriptions` - User subscription records
- `subscription_payments` - Payment records tied to a subscription
- `tenants` - Business entities (e.g., Laundry Bagus, Toko Sukses)
- `tenant_user` - Pivot table to assign users to tenants with roles

## 🚀 Installation

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
Author : Kyky Sukiawan - scarecrow646@gmail.com