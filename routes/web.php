<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\FixedAssetsController;
use App\Http\Controllers\ReportController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Models\allreports;

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

Route::get('/', function () {

    $reports = allreports::all();

    return view('homePage', ['reports' => $reports]);
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
Route::get('editAssets/{id}',[FixedAssetsController::class, 'edit'])->name('assets.edit');
Route::put('updateAssets/{id}', [FixedAssetsController::class, 'editAssets']);
Route::get('getUseLife/{accountClass}', [AccountController::class, 'getUseLife']);


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

Route::get('/viewReport',[ReportController::class,'viewReports'])->name('viewReport');
Route::get('/viewReport',[ReportController::class,'viewReport'])->name('viewReport');
Route::get('/genReport',[FixedAssetsController::class,'index']);
Route::get('/genReport',[FixedAssetsController::class,'genReport'])->name('genReport');

Route::get('/exportPDF', [FixedAssetsController::class,'exportPDF'])->name('exportPDF');

Route::post('/genReport', [ReportController::class, 'generateReport'])->name('report.generate');
Route::get('deleteReport/{ReportTitle}', [ReportController::class,'destroy']);

Route::get('/report/{ReportTitle}', [ReportController::class, 'show']);