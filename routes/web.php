<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;


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

// Route::get('/', function () {

//     \Illuminate\Support\Facades\DB::listen(function($query) {
//         logger($query->sql);
//     });

//     return view('posts', [
//         'posts' => Post::latest('published_at')->with('category', 'author')->get()
//     ]);
// });

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});

// Route::get('/posts/{post}', function (Post $post) {
//     return view('post', ['post' => $post]);
// })->whereNumber('post');

// Route::get('categories/{category:slug}', function(Category $category) {
//     return view('category', [
//         'posts' => $category->posts
//     ]);
// });

// Route::get('/testing',[TestController::class, "test"]);
// // Route::get('/', function(){
// //     return 'test';
// // });

// Route::get('authors/{author:name}', function (User $author) {
//     return view('posts', [
//         'posts' => $author->posts,
//         'categories' => Category::all()
//     ]);
// });

// Route::get('authors/{author}', function (User $author) {
//     // dd($author);
//     return view('posts', [
//         'posts' => $author->posts,
//          'categories' => Category::all()
//     ]);
// });
