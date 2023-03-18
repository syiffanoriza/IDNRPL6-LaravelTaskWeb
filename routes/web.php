<?php

// dont forget to call the controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\TaskList\TaskListExtension;

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

/*
|--------------------------------------------------------------------------
| Code Notes: 8 Feb — Migration
|--------------------------------------------------------------------------
|
|   to migrate                      php artisan migrate
|   to undo migration               php artisan migrate:rollback
|   to make a table to migrate      php artisan make:migration create_customtablename_table
|   to refresh db for new data      php artisan migrate:refresh
|   [!! REFRESH RESETS DATA]
|   how to add column to table      php artisan make:migration add_column_customcolumnname_destinationtablename_table --table=tablename
|
*/

// 7 feb 2023
// how to call page via controllers
Route::get('/', [HomeController::class, 'index']);

// ---- logic routes ----

// how to show search query via controller
Route::get('/tasks', [TaskController::class, 'index']);

// how to use GET param query via controller
Route::get('tasks/{id}', [TaskController::class, 'show']);

// how to use POST method via controller
Route::post('/tasks', [TaskController::class, 'store']);

// how to use PATCH method via controller
Route::patch('/tasks/{id}', [TaskController::class, 'update']);

// how to use DELETE method via controller
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
// ---

// 15 feb 2023 - route views
Route::get('/tasks/data/create', [TaskController::class, 'create']);

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);

// ---
// Route::get('tasks/{param}', function($param) use($taskList){
//     return $taskList[$param];
// });

// // 3 feb 2023
// // menggunakan method post

// Route::post('tasks', function() use($taskList){
//     // return request()->all();

//     $taskList[request()->label] = request()->task;
//     return $taskList;
// });

// // menggunakan method patch

// Route::patch('tasks/{key}', function($key) use($taskList){
//     $taskList[$key] = request()->task;
//     return $taskList;
// });

// // menggunakan method put

// Route::put('tasks/{key}', function($key) use($taskList){
//     $taskList[$key] = request()->task;
//     return $taskList;
// });

// // menggunakan method delete

// Route::delete('tasks/{key}', function($key) use($taskList){
//     unset($taskList[$key]);
//     return $taskList;
// });