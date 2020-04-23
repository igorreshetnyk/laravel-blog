<?php

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

use App\Http\Controllers\DiggingDeeperController;

Auth::routes();

//>> Blog section

Route::get('/', 'Blog\PostController@index');
Route::get('/post/{slug}', 'Blog\PostController@show')->name('post.show');

//<<
//>> Admin section

$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix'    => 'admin/blog',
];
Route::group($groupData, function () {
    //BlogCategory
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');

    //BlogPosts
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});

//<<
