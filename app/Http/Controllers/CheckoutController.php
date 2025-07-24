<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Subscriptions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function showRegister(Package $package)
    {
        return view('checkout.register', compact('package'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // $dbName = 'userdb_' . Str::random(6);
        // DB::statement("CREATE DATABASE `$dbName`");

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $package = Package::where('id', $request->package)->first();

            if(empty($package)){
                return back()->with('error', 'Paket tidak ditemukan.');
            }
            $subscription = Subscriptions::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'status' => 'unpaid',
                'started_at' => null,
                'expired_at' => null,
                'payment_status' => 'unpaid',
            ]);
            

            // Buat tenant jika kamu ingin langsung buat tenant setelah bayar
            // atau bisa ditunda sampai pembayaran berhasil
        });

        Auth::login($user);
        return redirect('/dashboard');
    }
}
