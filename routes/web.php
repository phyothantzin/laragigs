<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
// All Listing
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [
    ListingController::class,
    'create',
])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware(
    'auth'
);

// Show Edit Form
Route::get('/listings/{listing}/edit', [
    ListingController::class,
    'edit',
])->middleware('auth');

// Edit Submit Listing
Route::put('/listings/{listing}', [
    ListingController::class,
    'update',
])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [
    ListingController::class,
    'destroy',
])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [
    ListingController::class,
    'manage',
])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// Create New Register User
Route::post('/users', [UserController::class, 'store']);

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Logout User
Route::post('users/logout', [UserController::class, 'logout'])->middleware(
    'auth'
);

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//         ->header('content-type', 'text/plain')
//         ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return response($request->name . ' ' . $request->city);
// });
