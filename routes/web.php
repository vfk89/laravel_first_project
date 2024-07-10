<?php


use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::group(['namespace' => 'App\Http\Controllers\Post'], function(){

    Route::get('posts', 'IndexController')->name('post.index');
    Route::get('posts/create', 'CreateController')->name('post.create');
    Route::post('posts/create', 'StoreController')->name('post.store');
    Route::get('posts/{post}', 'ShowController')->name('post.show');
    Route::get('posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('posts/{post}', 'DestroyController')->name('post.delete');

});




//Route::get('/posts/{post}/restore', [PostController::class, 'restore'])->name('post.restore');



Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');


