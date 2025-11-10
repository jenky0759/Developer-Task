<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
    Customer Routes
*/
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

/*
    Contact Routes
*/
Route::get("/contact/{id}", [ContactController::class, "show"])
    ->name("contact.getById")
    ->where('id', '[0-9]+');

Route::get("/contact/list", [ContactController::class, "getList"])
    ->name("contact.getList");

Route::post("/contact", [ContactController::class, "store"])
    ->name("contact.store");

Route::put("/contact/{id}", [ContactController::class, "update"])
    ->name("contact.update");

Route::delete("/contact/{id}", [ContactController::class, "destroy"])
    ->name("contact.destroy");
