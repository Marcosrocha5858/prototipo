<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\CompanyController;
use App\Http\Controllers\Tenant\TenantController;


Route::get('companies', [CompanyController::class,'index'])->name('company.index');
Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('company', [CompanyController::class,'store'])->name('company.store');
 Route::get('company/{domain}', [CompanyController::class, 'show'])->name('company.show');
Route::get('company/edit/{domain}', [CompanyController::class, 'edit'])->name('company.edit');
// $this->put('company/{id}', 'Tenant\CompanyController@update')->name('company.update');
// $this->delete('company/{id}', 'Tenant\CompanyController@destroy')->name('company.destroy');

Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');
Route::get('/', [TenantController::class, 'index'])->name('tenant');
