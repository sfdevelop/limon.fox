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

use App\Http\Controllers\Controller;
use Nexmo\Account\PrefixPrice;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'BlogController')-> names('blog.post');
});


// Route::resource('rest', 'RestTestController')->names('RestTest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Админка блога
$groupData=[
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];

Route::group($groupData, function () {
    Route::resource('categories', 'CategoryController')->names('blog.admin.categories');
});
