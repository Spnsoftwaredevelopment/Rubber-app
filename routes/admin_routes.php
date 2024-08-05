<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RubberController;
use Illuminate\Support\Facades\Auth;



Route::middleware(['isAdmin'])->group(function () {
//กลุ่มสินค้า
Route::get('admin/customers', [App\Http\Controllers\CustomersController::class, 'index'])->name('admin.customers.index');
Route::get('admin/customers/create', [App\Http\Controllers\CustomersController::class, 'create'])->name('admin.customers.create');
Route::post('admin/customers/store', [App\Http\Controllers\CustomersController::class, 'store'])->name('admin.customers.store');
Route::get('admin/customers/edit{id}', [App\Http\Controllers\CustomersController::class, 'edit'])->name('admin.customers.edit');
Route::put('admin/customers/update{id}', [App\Http\Controllers\CustomersController::class, 'update'])->name('admin.customers.update');
Route::get('admin/customers/delete{id}', [App\Http\Controllers\CustomersController::class, 'destroy'])->name('customers_destroy');

//กลุ่ม editrubber for Admin
Route::get('admin/rubbers/edit{id}', [App\Http\Controllers\RubberController::class, 'edit'])->name('admin.rubbers.edit');
Route::get('admin/material/delete{id}', [App\Http\Controllers\RubberController::class, 'destroymat'])->name('destroymat');
Route::delete('admin/material/delete{id}', [App\Http\Controllers\RubberController::class, 'destroymat'])->name('destroymat');

//กลุ่ม editrubber for Admin
Route::get('admin/departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('admin.departments.index');
Route::get('admin/departments/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('admin.departments.create');
Route::post('admin/departments/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('admin.departments.store');
Route::get('admin/departments/edit{id}', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('admin.departments.edit');
Route::put('admin/departments/update{id}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('admin.departments.update');
Route::get('admin/departments/delete{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments_destroy');

//กลุ่ม USM
Route::get('admin/usermanagement', [App\Http\Controllers\UserController::class, 'index'])->name('admin.usermanagement.index');
Route::get('admin/usermanagement/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.usermanagement.create');
Route::post('admin/usermanagement/store', [App\Http\Controllers\UserController::class, 'store'])->name('admin.usermanagement.store');
Route::get('admin/usermanagement/edit{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.usermanagement.edit');
Route::put('admin/usermanagement/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.usermanagement.update');
Route::get('admin/usermanagement/delete{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usermanagement_destroy');


Route::get('admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.products.index');
Route::get('admin/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.products.create');
Route::post('admin/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.products.store');
Route::get('admin/products/edit{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('admin/products/update{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.products.update');
Route::get('admin/products/delete{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products_destroy');


Route::get('admin/rubbers/all_test_rubbers{id}', [App\Http\Controllers\RubberController::class, 'all_test'])->name('all_test');
Route::post('/admin/rubbers/fecth_report', [App\Http\Controllers\RubberController::class, 'get_All'])->name('get_All');






Route::put('admin/rubbers/all_test_update/{id}', [App\Http\Controllers\RubberController::class, 'all_test_update'])->name('all_test_update');
Route::get('admin/rubbers/show_test_rubbers/{id}', [App\Http\Controllers\RubberController::class, 'show_test'])->name('show_test');



});
