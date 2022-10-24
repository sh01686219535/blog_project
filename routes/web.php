<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[blogController::class,'index'])->name('/');
Route::get('/single-post',[blogController::class,'singlePost'])->name('single-post');
Route::get('/single-result',[blogController::class,'singleResult'])->name('single-result');
Route::get('/about',[blogController::class,'about'])->name('about');
Route::get('/contact',[blogController::class,'contact'])->name('contact');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/add-blog',[BlogAdminController::class,'addBlog'])->name('add-blog');
    Route::post('/new-blog',[BlogAdminController::class,'saveBlog'])->name('new-blog');
    Route::get('/manage-blog',[BlogAdminController::class,'manageBlog'])->name('manage-blog');
    Route::get('/blogStatus/{id}',[BlogAdminController::class,'statusBlog'])->name('blogStatus');
    Route::get('/edit-blog/{id}',[BlogAdminController::class,'editBlog'])->name('edit-blog');
    Route::post('/delete-blog',[BlogAdminController::class,'deleteBlog'])->name('delete-blog');
    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add-category');
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage-category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new-category');
    Route::get('/status/{id}',[CategoryController::class,'CategoryStatus'])->name('status');
    Route::get('/edit-category/{id}',[CategoryController::class,'EditCategory'])->name('edit-category');
    Route::post('/update-category',[CategoryController::class,'UpdateCategory'])->name('update-category');
    Route::post('/delete-category',[CategoryController::class,'DeleteCategory'])->name('delete-category');
    Route::get('/add-author',[AuthorController::class,'addAuthor'])->name('add-author');
    Route::get('/manage-author',[AuthorController::class,'ManageAuthor'])->name('manage-author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new-author');
    Route::get('/edit-author/{id}',[AuthorController::class,'editAuthor'])->name('edit-author');
    Route::post('/delete-author',[AuthorController::class,'deleteAuthor'])->name('delete-author');
    Route::post('/update-author',[AuthorController::class,'updateAuthor'])->name('update-author');
    Route::get('/authorStatus/{id}',[AuthorController::class,'authorStatus'])->name('authorStatus');
});
