<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController; // Add this
use App\Http\Controllers\LoanTransactionController; // Add this
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Your existing Customer Route
Route::resource('customers', CustomerController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/categories', function () { return view('Categories.index'); })->name('categories');

    Route::get('/inventory/pdf', [InventoryController::class, 'exportPdf'])->name('inventory.pdf');
    Route::resource('inventory', InventoryController::class);

    // --- NEW ACTIVITY 13 ROUTES ---
    // PDF must go before the resource route
    Route::get('/loantransactions/pdf', [LoanTransactionController::class, 'generatePDF'])->name('loantransactions.pdf');

    Route::resource('loans', LoanController::class);
    Route::resource('loantransactions', LoanTransactionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
