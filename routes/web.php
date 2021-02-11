<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Hotspot\HotspotHomeController;
use App\Http\Controllers\Hotspot\HotspotController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Hotspot\DeviceController;
use App\Http\Controllers\Radius\NasController;
use App\Http\Controllers\Radius\RadacctController;
use App\Http\Controllers\Radius\RadcheckController;
use App\Http\Controllers\Radius\RadgroupcheckController;
use App\Http\Controllers\Radius\RadgroupreplyController;
use App\Http\Controllers\Radius\RadpostauthController;
use App\Http\Controllers\Radius\RadreplyController;
use App\Http\Controllers\Radius\radusergroupController;

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




Route::get('/', [HotspotController::class, 'index']);

// Route::prefix('admin')->group(function(){
    
//     Route::get('/', [HomeController::class, 'index'])->middleware('auth');

   
// });

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');  
Route::get('/hotspot', [HotspotController::class, 'index']);

// Route::post('login', [AuthController::class, 'index']);
// Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function(){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'getAll']);  
    Route::get('teachers', [UserController::class, 'getTeachers']);
    Route::get('students', [UserController::class, 'getStudents']);
    Route::get('visitors', [UserController::class, 'getVisitors']);
});

// Route::fallback(function(){
// return view('404');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

 require __DIR__.'/auth.php';