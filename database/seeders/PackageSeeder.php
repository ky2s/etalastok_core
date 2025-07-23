<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'code' => 'starter',
            'name' => 'Starter Plan',
            'price' => 29000,
            'billing_cycle' => 'monthly',
            'max_tenants' => 1,
            'max_users' => 2,
            'description' => 'Paket dasar untuk bisnis kecil.'
        ]);

        Package::create([
            'code' => 'premium',
            'name' => 'Premium Plan',
            'price' => 99000,
            'billing_cycle' => 'monthly',
            'max_tenants' => 5,
            'max_users' => 10,
            'description' => 'Paket lanjutan untuk bisnis berkembang.'
        ]);
    }
}
