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

require __DIR__.'/auth.php';


Route::get('/', [HotspotController::class, 'index'])->middleware('guest');

// Route::prefix('admin')->group(function(){
    
//     Route::get('/', [HomeController::class, 'index'])->middleware('auth');

   
// });

// Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');  
Route::get('/hotspot', [HotspotController::class, 'index'])->name('hotspot');
Route::get('/hotspot/redirect', [HotspotController::class, 'redirectToLogin'])->name('redirectToLogin');
Route::get('/hotspot/login', [HotspotController::class, 'login'])->name('hotspotLogin');

// Route::post('login', [AuthController::class, 'index']);
// Route::post('login', [AuthController::class, 'login']);
Route::get('/admins', [UserController::class, 'showAdmins'])->middleware('auth')->name('admins');
Route::get('/remove', [UserController::class, 'remove'])->middleware('auth')->name('remove');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('nas', [NasController::class, 'index'])->name('nas');
    Route::get('nas/register', [NasController::class, 'register'])->name('registerNas');
    Route::post('nas/register', [NasController::class, 'create'])->name('createNas');
    Route::get('nas/register/{id}', [NasController::class, 'remove'])->name('removeNas');
    
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/online', [UserController::class, 'online'])->name('online');
    Route::get('users/blockeds', [UserController::class, 'showBlockeds'])->name('blockeds');
    Route::get('users/block/{id}', [UserController::class, 'block'])->name('block');
    Route::get('user/historic/{id}', [UserController::class, 'historic'])->name('historic');
    Route::get('user/show/{id}', [UserController::class, 'show'])->name('show');
    Route::get('user/approve/{id}', [UserController::class, 'approveUser'])->name('approve');
    Route::put('user/approve/{id}', [UserController::class, 'updateApprove'])->name('updateApprove');

    Route::get('admin/register', [UserController::class, 'newAdmin'])->name('registerAdmin');
    Route::get('admin/profile', [UserController::class, 'profileAdmin'])->name('profileAdmin');
    Route::put('admin/update/{id}', [UserController::class, 'updateAdmin'])->name('updateAdmin');

    Route::get('groups', [RadgroupreplyController::class, 'index'])->name('groups');
    Route::get('groups/register', [RadgroupreplyController::class, 'register'])->name('registerGroup');
    Route::post('groups/register', [RadgroupreplyController::class, 'create'])->name('createGroup');
    Route::get('groups/edit/{id}', [RadgroupreplyController::class, 'edit'])->name('editGroup');
    Route::put('groups/update/{id}', [RadgroupreplyController::class, 'update'])->name('updateGroup');
});



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
