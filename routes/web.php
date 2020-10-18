<?php

use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DailyTaskStatController;
use App\Http\Controllers\ArterialPressureController;
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

Route::get('/', [IndexController::class, 'index'])
    ->name('home');
// Задачи
Route::get('tasks/archive', [TaskController::class, 'archive'])
    ->name('tasks.archive');
Route::resource('tasks', TaskController::class);
// Ежедневные задачи
Route::resource('daily_tasks', DailyTaskController::class);
// Статистика по ежедневным задачам
Route::get('daily_task_stats/index', [DailyTaskStatController::class, 'index'])
    ->name('daily_task_stats.index');
Route::post('daily_task_stats/store', [DailyTaskStatController::class, 'store'])
    ->name('daily_task_stats.store');
Route::delete('daily_task_stats/destroy/{id}', [DailyTaskStatController::class, 'destroy'])
    ->name('daily_task_stats.destroy');
// АД
Route::resource('arterial_pressures', ArterialPressureController::class);
