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

Route::resource('customers', CustomerController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/categories', function () {
    return view('Categories.index');
})->middleware(['auth', 'verified'])->name('categories');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/inventory/pdf', [InventoryController::class, 'exportPdf'])->name('inventory.pdf');
    Route::resource('inventory', InventoryController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. ADMIN ONLY ROUTES (Protected by Proper RBAC Middleware)
Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {

    // Categories
    Route::get('/categories', function () { return view('Categories.index'); })->name('categories');

    // Customers
    Route::resource('customers', CustomerController::class);

    // Inventory
    Route::get('/inventory/pdf', [InventoryController::class, 'exportPdf'])->name('inventory.pdf');
    Route::resource('inventory', InventoryController::class);

    // Loans & Transactions
    Route::get('/loantransactions/pdf', [LoanTransactionController::class, 'generatePDF'])->name('loantransactions.pdf');
    Route::resource('loans', LoanController::class);
    Route::resource('loantransactions', LoanTransactionController::class);

});

require __DIR__.'/auth.php';
