<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// to bring in Listing model namespace
use App\Models\Listing;

// for Request class

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<


// All Listings --(HOME PAGE)--
Route::get('/', [ListingController::class, 'index']);

// Show Create Listing Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Listing Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing} ', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing} ', [ListingController::class, 'destroy'])->middleware('auth');

// Show Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//------------------------it should be at the end of Listing routes----------------------
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//********************************************************************************************
//***************************************USER ROUTES******************************************
// Show Register/Create User Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store User Data
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

