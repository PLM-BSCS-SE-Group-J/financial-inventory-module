<?php

use App\Http\Controllers\FixedAssetsController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

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

Route::get('/loginPage', function () {
    return view('loginPage');
});

Route::get('/homePage', function () {
    return view('homePage');
});

Route::get('/fixedAssets', function () {
    return view('fixedAssets');
});

Route::get('/fixedAssets',[FixedAssetsController::class,'show'])->name('fixedAssets');
Route::post('/fixedAssets', [FixedAssetsController::class, 'DataInsert'])->name('assets.add');
Route::delete('/fixedAssets/{id}', [FixedAssetsController::class, 'destroy'])->name('assets.destroy');
Route::get('/exportPDF', [FixedAssetsController::class,'exportPDF'])->name('exportPDF');
Route::get('editAssets/{id}',[FixedAssetsController::class, 'edit']);
Route::put('updateAssets/{id}', [FixedAssetsController::class, 'editAssets']);

Route::get('/export', [FixedAssetsController::class,'export'])->name('export');
Route::post('/import', [FixedAssetsController::class,'import'])->name('import');
Route::get('/search', [FixedAssetsController::class,'search'])->name('search');

Route::get('/accounts', function () {
    return view('accounts');
});

Route::get('/genReport', function () {
    return view('genReport');
});

Route::get('/viewReport', function () {
    return view('viewReport');
});

Route::get('/addAssets', function () {
    return view('addAssets');
});