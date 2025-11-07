<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get("/customer/{id}", [CustomerController::class, "show"])
    ->name("customer.getById")
    ->where('id', '[0-9]+');

Route::get("/customer/list", [CustomerController::class, "getList"])
    ->name("customer.getList");

Route::post("/customer", [CustomerController::class, "store"])
    ->name("customer.store");

Route::put("/customer/{id}", [CustomerController::class, "update"])
    ->name("customer.update");

Route::delete("/customer/{id}", [CustomerController::class, "destroy"])
    ->name("customer.destroy");
