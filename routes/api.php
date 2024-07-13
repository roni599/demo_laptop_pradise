<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employee\EmployeeController;
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
