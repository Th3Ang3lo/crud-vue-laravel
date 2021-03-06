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
use App\Http\Controllers\Admin\Users\DeleteUserController as AdminDeleteUserController;
use App\Http\Controllers\Admin\Users\ListUsersController as AdminListUsersController;
use App\Http\Controllers\Admin\Users\GetUserController as AdminGetUserController;

use App\Http\Controllers\Admin\Tasks\CreateTaskController as AdminCreateTaskController;
use App\Http\Controllers\Admin\Tasks\UpdateTaskController as AdminUpdateTaskController;
use App\Http\Controllers\Admin\Tasks\DeleteTaskController as AdminDeleteTaskController;
use App\Http\Controllers\Admin\Tasks\ListTasksController as AdminListTasksController;
use App\Http\Controllers\Admin\Tasks\GetTaskController as AdminGetTaskController;

Route::post('/admin/auth', [AdminAuthController::class, 'handle']);
Route::middleware('jwt.admin')->post('/admin/user', [AdminCreateUserController::class, 'handle']);
Route::middleware('jwt.admin')->put('/admin/user/{id}', [AdminUpdateUserController::class, 'handle']);
Route::middleware('jwt.admin')->delete('/admin/user/{id}', [AdminDeleteUserController::class, 'handle']);
Route::middleware('jwt.admin')->get('/admin/user/list', [AdminListUsersController::class, 'handle']);
Route::middleware('jwt.admin')->get('/admin/user/{id}', [AdminGetUserController::class, 'handle']);


Route::middleware('jwt.admin')->post('/admin/task', [AdminCreateTaskController::class, 'handle']);
Route::middleware('jwt.admin')->put('/admin/task/{id}', [AdminUpdateTaskController::class, 'handle']);
Route::middleware('jwt.admin')->delete('/admin/task/{id}', [AdminDeleteTaskController::class, 'handle']);
Route::middleware('jwt.admin')->get('/admin/task/list', [AdminListTasksController::class, 'handle']);
Route::middleware('jwt.admin')->get('/admin/task/{id}', [AdminGetTaskController::class, 'handle']);
