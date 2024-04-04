<?php

use App\Http\Controllers;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    /* Base URL */
    Route::get('/', fn () => to_route('login'));
    /* Login */
    Route::get('login', [Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [Controllers\Auth\AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    /* Dashboard */ Route::get('dashboard', DashboardController::class)->name('dashboard')->middleware('permission:dashboard');

    /* Permission index */ Route::get('permission', [Controllers\PermissionController::class, 'index'])->name('permission.index')->middleware('permission:permission.index');
    /* Permission create */ Route::get('permission/create', [Controllers\PermissionController::class, 'create'])->name('permission.create')->middleware('permission:permission.create');
    /* Permission store */ Route::post('permission', [Controllers\PermissionController::class, 'store'])->name('permission.store')->middleware('permission:permission.store');
    /* Permission edit */ Route::get('permission/{permission}/edit', [Controllers\PermissionController::class, 'edit'])->name('permission.edit')->middleware('permission:permission.edit');
    /* Permission update */ Route::put('permission/{permission}', [Controllers\PermissionController::class, 'update'])->name('permission.update')->middleware('permission:permission.update');
    /* Permission destroy */ Route::delete('permission/{permission}', [Controllers\PermissionController::class, 'destroy'])->name('permission.destroy')->middleware('permission:permission.destroy');

    /* Role index */ Route::get('role', [Controllers\RoleController::class, 'index'])->name('role.index')->middleware('permission:role.index');
    /* Role create */ Route::get('role/create', [Controllers\RoleController::class, 'create'])->name('role.create')->middleware('permission:role.create');
    /* Role store */ Route::post('role', [Controllers\RoleController::class, 'store'])->name('role.store')->middleware('permission:role.store');
    /* Role show */ Route::get('role/{role}', [Controllers\RoleController::class, 'show'])->name('role.show')->middleware('permission:role.show');
    /* Role edit */ Route::get('role/{role}/edit', [Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware('permission:role.edit');
    /* Role update */ Route::put('role/{role}', [Controllers\RoleController::class, 'update'])->name('role.update')->middleware('permission:role.update');
    /* Role destroy */ Route::delete('role/{role}', [Controllers\RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:role.destroy');

    /* User index */ Route::get('user', [Controllers\UserController::class, 'index'])->name('user.index')->middleware('permission:user.index');
    /* User create */ Route::get('user/create', [Controllers\UserController::class, 'create'])->name('user.create')->middleware('permission:user.create');
    /* User store */ Route::post('user', [Controllers\UserController::class, 'store'])->name('user.store')->middleware('permission:user.store');
    /* User edit */ Route::get('user/{user}/edit', [Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('permission:user.edit');
    /* User update */ Route::put('user/{user}', [Controllers\UserController::class, 'update'])->name('user.update')->middleware('permission:user.update');
    /* User destroy */ Route::delete('user/{user}', [Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:user.destroy');

    /* Category index */ Route::get('category', [Controllers\CategoryController::class, 'index'])->name('category.index')->middleware('permission:category.index');
    /* Category create */ Route::get('category/create', [Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('permission:category.create');
    /* Category store */ Route::post('category', [Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('permission:category.store');
    /* Category edit */ Route::get('category/{category}/edit', [Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware('permission:category.edit');
    /* Category update */ Route::put('category/{category}', [Controllers\CategoryController::class, 'update'])->name('category.update')->middleware('permission:category.update');
    /* Category destroy */ Route::delete('category/{category}', [Controllers\CategoryController::class, 'destroy'])->name('category.destroy')->middleware('permission:category.destroy');

    /* Storage index */ Route::get('storages', [Controllers\StorageController::class, 'index'])->name('storages.index')->middleware('permission:storage.index');
    /* Storage create */ Route::get('storages/create', [Controllers\StorageController::class, 'create'])->name('storages.create')->middleware('permission:storage.create');
    /* Storage store */ Route::post('storages', [Controllers\StorageController::class, 'store'])->name('storages.store')->middleware('permission:storage.store');
    /* Storage edit */ Route::get('storages/{storage}/edit', [Controllers\StorageController::class, 'edit'])->name('storages.edit')->middleware('permission:storage.edit');
    /* Storage update */ Route::put('storages/{storage}', [Controllers\StorageController::class, 'update'])->name('storages.update')->middleware('permission:storage.update');
    /* Storage destroy */ Route::delete('storages/{storage}', [Controllers\StorageController::class, 'destroy'])->name('storages.destroy')->middleware('permission:storage.destroy');

    /* IncomingDocument index */ Route::get('incoming-document', [Controllers\IncomingDocumentController::class, 'index'])->name('incoming-document.index')->middleware('permission:incoming-document.index');
    /* IncomingDocument create */ Route::get('incoming-document/create', [Controllers\IncomingDocumentController::class, 'create'])->name('incoming-document.create')->middleware('permission:incoming-document.create');
    /* IncomingDocument store */ Route::post('incoming-document', [Controllers\IncomingDocumentController::class, 'store'])->name('incoming-document.store')->middleware('permission:incoming-document.store');
    /* IncomingDocument destroy */ Route::delete('incoming-document/{incoming_document}', [Controllers\IncomingDocumentController::class, 'destroy'])->name('incoming-document.destroy')->middleware('permission:incoming-document.destroy');

    /* OutgoingDocument index */ Route::get('outgoing-document', [Controllers\OutgoingDocumentController::class, 'index'])->name('outgoing-document.index')->middleware('permission:outgoing-document.index');
    /* OutgoingDocument create */ Route::get('outgoing-document/create', [Controllers\OutgoingDocumentController::class, 'create'])->name('outgoing-document.create')->middleware('permission:outgoing-document.create');
    /* OutgoingDocument store */ Route::post('outgoing-document', [Controllers\OutgoingDocumentController::class, 'store'])->name('outgoing-document.store')->middleware('permission:outgoing-document.store');
    /* OutgoingDocument destroy */ Route::delete('outgoing-document/{outgoing_document}', [Controllers\OutgoingDocumentController::class, 'destroy'])->name('outgoing-document.destroy')->middleware('permission:outgoing-document.destroy');

    /*  DocumentReport index */ Route::get('document_report', [Controllers\DocumentReportController::class, 'index'])->name('document_report.index')->middleware('permission:document_report.index');
    /*  DocumentReport show */ Route::post('document_report_show', [Controllers\DocumentReportController::class, 'show'])->name('document_report.show')->middleware('permission:document_report.show');

    // /* Profile edit */ Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    // /* Profile update */ Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    // /* Profile destroy */ Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Logout destroy */ Route::post('logout', [Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
