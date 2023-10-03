<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyCRUDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QrCodeController;

Route::resource('companies', CompanyCRUDController::class);
Route::put('update', [CompanyCRUDController::class, 'update'])->name('form7p_appearance.update');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/qrcode', [QrCodeController::class, 'index']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('index2', [CompanyCRUDController::class, 'index2'])->name('companies.index2');
// Route::view('users/create', "auth.register")->name('user.store');

Route::resource('users', UserController::class);

Route::get('editform1',[CompanyCRUDController::class, 'editform1'])->name('companies.editform1');
Route::post('form1',[CompanyCRUDController::class, 'form1'])->name('form1.store');
Route::get('form11',[CompanyCRUDController::class, 'form7p2'])->name('form1.form7p2');
Route::get('form12',[CompanyCRUDController::class, 'form7p3'])->name('form1.form7p3');
Route::get('form13',[CompanyCRUDController::class, 'form7p4'])->name('form1.form7p4');
Route::get('form14',[CompanyCRUDController::class, 'form7p5'])->name('form1.form7p5');
Route::get('form15',[CompanyCRUDController::class, 'form7p6'])->name('form1.form7p6');

Route::post('store1',[CompanyCRUDController::class, 'store1'])->name('companies.store1');
Route::get('thanks', [CompanyCRUDController::class, 'thanks'])->name('companies.thanks');


Route::get('editform2',[CompanyCRUDController::class, 'editform2'])->name('companies.editform2');
Route::post('form2',[CompanyCRUDController::class, 'form2'])->name('form2.store');
Route::get('form21',[CompanyCRUDController::class, 'formpm2'])->name('form2.formpm2');
Route::get('form22',[CompanyCRUDController::class, 'formpm3'])->name('form2.formpm3');
Route::get('form23',[CompanyCRUDController::class, 'formpm4'])->name('form2.formpm4');
Route::get('form24',[CompanyCRUDController::class, 'formpm5'])->name('form2.formpm5');
Route::get('form25',[CompanyCRUDController::class, 'formpm6'])->name('form2.formpm6');

Route::post('store2',[CompanyCRUDController::class, 'store2'])->name('companies.store2');
