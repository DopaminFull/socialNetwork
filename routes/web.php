<?php

use App\Comment;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\PostResource;
use App\Notification;
use App\Post;
use App\User;

use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

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


# Global Routes START
Route::get('u/{user}', 'HomeController@profile')->where('user', '[0-9]+')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

#follow routes

Route::post('/follow/{id}', 'UserController@follow');
Route::post('/unfollow/{id}', 'UserController@unfollow');

#auth
Auth::routes();
#notifications routes
Route::post('/notifications', 'NotificationController@getAll');
Route::get('/posts', 'PostController@posts');
Route::post('/notifications_seen', 'NotificationController@mark_seen');
Route::post('/post', 'PostController@store');
Route::post('/search', 'SearchController@client');
Route::get('/comments/{post}', 'CommentsController@index');
Route::post('/comment', 'CommentsController@store');
Route::post('/like', 'LikeController@like');
Route::post('/unlike', 'LikeController@unlike');

# Update Profile START
Route::post('upload/profile', 'UserController@upload')->name('uploadprofile');
# Update Profile END

use Illuminate\Support\Facades\DB;

Route::get('/testi', function () { });
