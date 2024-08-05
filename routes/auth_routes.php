

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RubberController;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth'])->group(function () {

    //Rubberformula เพิ่มสูตรยาง
    Route::get('admin/dashboards', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/rubbers/testlabstep', [App\Http\Controllers\RubberController::class, 'testlab'])->name('admin.rubbers.testlab');
    Route::get('admin/rubbers', [App\Http\Controllers\RubberController::class, 'index'])->name('admin.rubbers.index');
    Route::get('admin/rubbers/create', [App\Http\Controllers\RubberController::class, 'create'])->name('admin.rubbers.create');
    Route::post('admin/rubbers/store', [App\Http\Controllers\RubberController::class, 'store'])->name('admin.rubbers.store');
    Route::get('admin/rubbers/beforetest{id}', [App\Http\Controllers\RubberController::class, 'beforetest'])->name('beforetest');
    Route::get('admin/rubbers/show{id}', [App\Http\Controllers\RubberController::class, 'show'])->name('admin.rubbers.show');
    //Route::put('admin/rubbers/update{id}', [App\Http\Controllers\RubberController::class, 'update'])->name('admin.rubbers.update');
    Route::put('admin/rubbers/update{id}', [App\Http\Controllers\RubberController::class, 'update'])
        ->name('admin.rubbers.update')
        ->middleware(['isAdmin']);
    // Route::get('admin/rubbers/beforetest', [App\Http\Controllers\RubberController::class, 'beforetest'])->name('beforetest');
    //testlab ทดสอบ
    Route::get('admin/rubbers/testlabstep', [App\Http\Controllers\RubberController::class, 'testlab'])->name('admin.rubbers.testlab');
    Route::get('admin/rubbers/beforetest{id}', [App\Http\Controllers\RubberController::class, 'beforetest'])->name('beforetest');
    Route::post('admin/rubbers/storetest', [App\Http\Controllers\RubberController::class, 'storetest'])->name('storetest');
    Route::put('admin/rubbers/{id}', [App\Http\Controllers\RubberController::class, 'updateStatusAndInspection'])->name('admin.rubbers.updateStatusAndInspection');
    Route::put('admin/testby/{id}/', [App\Http\Controllers\RubberController::class, 'testby'])->name('admin.testby');



    // Route::put('admin/rubbershowtest/{id}', [App\Http\Controllers\RubberController::class, 'showtest'])->name('admin.rubbers.rubbershowtest');



});
