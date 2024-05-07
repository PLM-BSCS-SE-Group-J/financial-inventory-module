<?php

use App\Http\Controllers\AccountController;
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
//For landing pages
Route::get('/loginPage', function () {
    return view('loginPage');
});

Route::get('/homePage', function () {
    return view('homePage');
});


// For fixedAssets page:
Route::get('/fixedAssets', function () {
    return view('fixedAssets');
});
Route::get('/fixedAssets',[FixedAssetsController::class,'show'])->name('fixedAssets');
Route::get('delete/{id}', [FixedAssetsController::class,'destroy']);


//For add assets page
Route::get('/addAssets', function () {
    return view('addAssets');
});
Route::post('/addAssets', [FixedAssetsController::class, 'DataInsert'])->name('assets.add');
Route::get('/addAssets',[FixedAssetsController::class,'catfunct']);


// For Editing Fixed Assets page:
Route::get('editAssets/{id}',[FixedAssetsController::class, 'edit']);
Route::put('updateAssets/{id}', [FixedAssetsController::class, 'editAssets']);


//For Excel Import and Export
Route::get('/export', [FixedAssetsController::class,'export'])->name('export');
Route::post('/import', [FixedAssetsController::class,'import'])->name('import');


// For accounts page
Route::get('/accounts', function () {
    return view('accounts');
});
Route::get('/accounts',[AccountController::class,'index']);
Route::get('/deleteAccount/{id}', [AccountController::class, 'destroy']);


// For add accounts page
Route::get('/addAccounts', function () {
    return view('addAccounts');
});
Route::post('/addAccounts', [AccountController::class, 'InsertAccounts'])->name('accounts.add');


// For edit accounts page
Route::get('/editAccounts', function () {
    return view('editAccounts');
});
Route::get('editAccounts/{id}',[AccountController::class, 'viewedit']);
Route::put('updateAccounts/{id}',[AccountController::class, 'update']);


//For generate Report
Route::get('/genReport', function () {
    return view('genReport');
});

Route::get('/viewReport', function () {
    return view('viewReport');
});
Route::get('/genReport',[FixedAssetsController::class,'index']);
Route::get('/exportPDF', [FixedAssetsController::class,'exportPDF'])->name('exportPDF');

