<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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


Route::get( '/', [PostController::class, 'index'] )->name( 'posts.index' );

Route::get( '/post/{id}', [PostController::class, 'postDetails'] )->name( 'posts.postDetails' );

// Route::get( '/post/{id}', [PostController::class, 'show'] )->name( 'posts.postDetails' );

// Route for storing a new comment
Route::post( '/posts/{postId}/comments', [CommentController::class, 'storeComment'] )->name( 'comments.store' );

// Route for displaying comments
Route::get( '/posts/{postId}/comments', [CommentController::class, 'index'] )->name( 'comments.index' );
