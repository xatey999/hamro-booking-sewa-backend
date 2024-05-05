<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\RoomController;
use App\Models\HotelOwner;
use App\Models\HotelRooms;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.modules.index');
});


//route for hotel owner
Route::get('/add', [HotelController::class, 'index'])->name('addowner');
Route::post('/add', [HotelController::class, 'store'])->name('storeowner');
Route::get('/list', [HotelController::class, 'list'])->name('listowner');
Route::get('/delete/{id}', [HotelController::class, 'delete'])->name('delete.owner');
Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('edit.owner');
Route::post('/update/{id}', [HotelController::class, 'update'])->name('update.owner');



//routes for hotel rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('Addrooms');
Route::get('/createrooms', [RoomController::class, 'display'])->name('display.room.form');
Route::post('/createrooms', [RoomController::class, 'create'])->name('createrooms');
