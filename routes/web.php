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
Route::get('/json-owner', [App\Http\Controllers\Admin\HotelController::class, 'listMobile'])->name('employees.list.mob');
Route::get('/add', [HotelController::class, 'index'])->name('addowner');
Route::post('/add', [HotelController::class, 'store'])->name('storeowner');
Route::get('/list', [HotelController::class, 'list'])->name('listowner');
Route::get('/delete/{id}', [HotelController::class, 'delete'])->name('delete.owner');
Route::get('/editowner/{id}', [HotelController::class, 'edit'])->name('edit.owner');
Route::post('/update/{id}', [HotelController::class, 'update'])->name('update.owner');



//routes for hotel rooms
Route::get('/json', [RoomController::class, 'listMobile'])->name('list.mobile');
Route::get('/rooms', [RoomController::class, 'index'])->name('Addrooms');
Route::get('/createrooms', [RoomController::class, 'display'])->name('display.room.form');
Route::post('/createrooms', [RoomController::class, 'create'])->name('createrooms');
Route::get('/listrooms', [RoomController::class, 'list'])->name('listrooms');
Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit.rooms');
Route::post('/update/{id}', [RoomController::class, 'update'])->name('update.rooms');
<<<<<<< HEAD
=======
Route::get('/delete/{id}', [RoomController::class, 'delete'])->name('delete.rooms');

>>>>>>> 8ba1096d7ff4fa9da9d5606b64cb6c7dbf655725
