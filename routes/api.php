<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Expense\ExpenseController;
use App\Http\Controllers\Extra\ExtraController;
use App\Http\Controllers\POS\PosController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees/store', [EmployeeController::class, 'store']);
Route::delete('/employees/delete/{id}', [EmployeeController::class, 'delete']);
Route::put('/employees/update', [EmployeeController::class, 'update']);

Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers/store', [SupplierController::class, 'store']);
Route::delete('/suppliers/delete/{id}', [SupplierController::class, 'delete']);
Route::put('/suppliers/update', [SupplierController::class, 'update']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete']);
Route::put('/categories/update', [CategoryController::class, 'update']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);
Route::put('/products/update', [ProductController::class, 'update']);
Route::put('/products/stocks/update', [ProductController::class, 'stocks_update']);

Route::get('/expenses', [ExpenseController::class, 'index']);
Route::post('/expenses/store', [ExpenseController::class, 'store']);
Route::delete('/expenses/delete/{id}', [ExpenseController::class, 'delete']);
Route::put('/expenses/update', [ExpenseController::class, 'update']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers/store', [CustomerController::class, 'store']);
Route::delete('/customers/delete/{id}', [CustomerController::class, 'delete']);
Route::put('/customers/update', [CustomerController::class, 'update']);

Route::get('/subproducts/{id}', [CustomerController::class, 'subproduct']);

Route::get('/addProduct/{id}', [PosController::class, 'addProduct']);
Route::get('/allPos',[PosController::class, 'allPos']);
Route::get('/posremove/{id}', [PosController::class, 'posremove']);
Route::get('/posincrement/{id}', [PosController::class, 'posincrement']);
Route::get('/posdecrement/{id}', [PosController::class, 'posdecrement']);

Route::get('/allvat', [ExtraController::class, 'index']);
Route::post('/order', [ExtraController::class, 'orderDoneCustomer']);
