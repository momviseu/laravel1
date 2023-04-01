<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DemoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('/index');
})->name('homepage');


//     Route::get('/tag', [DemoController::class, 'tag']);
// Route::get('/category', [DemoController::class, 'category']);
// Route::get('/blog', [DemoController::class, 'blog']);



Route::prefix('/admin')->name('admin.')->group(function () {

    Route::get('/category', [CategoryController::class, 'index'])->name('category.indexCategory');
    Route::get('/createCategory', [CategoryController::class, 'CreateCategory'])->name('category.createCategory');
    Route::post('/storeCategory', [CategoryController::class, 'StoreCategory'])->name('storeCategory');

    Route::get('/editCategory/{id}', [CategoryController::class, 'EditCategory'])->name('category.editCategory');
    Route::put('/updateCategory/{id}', [CategoryController::class, 'SubmitEditCategory'])->name('updateCategory');
    Route::delete('/deleteCategory/{id}', [CategoryController::class, 'DeleteCategory'])->name('DeleteCategory');


    Route::get('/post/index', [PostController::class, 'index'])->name('post.indexPost');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.createPost');
    Route::post('/post/store', [PostController::class, 'storePost'])->name('storePost');
    Route::get('/post/edit/{id}', [PostController::class, 'editPost'])->name('post.editPost');
    Route::put('/post/update/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('/post/delete/{id}', [PostController::class, 'deletePost'])->name('deletePost');


});






