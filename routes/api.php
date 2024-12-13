<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::post('/admin/bus', [AdminController::class, 'addBus']);
        Route::put('/admin/bus/{bus}', [AdminController::class, 'updateBus']);
        Route::delete('/admin/bus/{bus}', [AdminController::class, 'deleteBus']);
        Route::post('/admin/ticket', [AdminController::class, 'addTicket']);
        Route::put('/admin/ticket/{ticket}', [AdminController::class, 'updateTicket']);
        Route::delete('/admin/ticket/{ticket}', [AdminController::class, 'deleteTicket']);
    });

    Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
        Route::get('/buses', [UserController::class, 'viewBuses']);
        Route::get('/tickets', [UserController::class, 'viewTickets']);
        Route::post('/tickets/purchase', [UserController::class, 'purchaseTicket']);
    });
});


