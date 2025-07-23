<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'dynamic.db'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::get('/db-check', function () {
    // Set manual koneksi dynamic untuk testing
    Config::set('database.connections.dynamic', [
        'driver' => 'mysql',
        'host' => '172.20.160.53',
        'port' => '3306',
        'database' => 'ayloundry',
        'username' => 'username',
        'password' => 'password',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
    ]);

    DB::purge('dynamic');       // Clear koneksi lama (jika ada)
    DB::reconnect('dynamic');   // Reconnect ulang

    try {
        $get = DB::connection('dynamic')->table('services')->get();
        return '✅ Database connected!';
    } catch (\Exception $e) {
        return '❌ Error: ' . $e->getMessage();
    }
});