<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanTransactionController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/categories', function () {
        return view('Categories.index');
    })->name('categories');

    Route::resource('inventory', InventoryController::class);
    Route::get('inventory/pdf', [InventoryController::class, 'exportPdf'])
        ->middleware(IsAdmin::class)
        ->name('inventory.pdf');

    Route::resource('loans', LoanController::class);
    Route::resource('loantransactions', LoanTransactionController::class)->only(['index', 'create', 'store']);

    Route::get('/loantransactions/pdf', [LoanTransactionController::class, 'generatePDF'])
        ->middleware(IsAdmin::class)
        ->name('loantransactions.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {
    Route::resource('customers', CustomerController::class);
});

require __DIR__.'/auth.php';
