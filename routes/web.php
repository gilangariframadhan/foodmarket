<?php

use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\EmailNotificationController;
use App\Http\Controllers\PushNotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Hompage
Route::get('/', function () {
    return redirect()->route('dashboard');
});

//Dashboard
Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(
        function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('users', UserController::class);
            Route::resource('food', FoodController::class);

            Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
                ->name('transactions.changeStatus');
            Route::resource('transactions', TransactionController::class);
        }
    );

Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);

Route::get('send-notification', [NotificationController::class, 'showForm']);
Route::post('send-notification', [NotificationController::class, 'sendNotification'])->name('send-notification');

Route::get('/email-notify', [EmailNotificationController::class, 'index']);
Route::post('/email-notify', [EmailNotificationController::class, 'send']);

Route::get('/dashboard/notifications', [PushNotificationController::class, 'create'])->name('notifications.create');
Route::post('/dashboard/notifications', [PushNotificationController::class, 'store'])->name('notifications.store');
