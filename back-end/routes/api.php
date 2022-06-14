<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\Users\CreateUserController as AdminCreateUserController;
use App\Http\Controllers\Admin\Users\UpdateUserController as AdminUpdateUserController;

Route::post('/admin/auth', [AdminAuthController::class, 'handle']);
Route::middleware('jwt.admin')->post('/admin/user', [AdminCreateUserController::class, 'handle']);
Route::middleware('jwt.admin')->put('/admin/user/{id}', [AdminUpdateUserController::class, 'handle']);
