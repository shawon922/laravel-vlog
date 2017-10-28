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

/*use App\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
*/


Route::group(['prefix' => app()->getLocale(), 'middleware' => ['locale']], function() {
	Route::get('/', 'PostsController@index')->name('post-list');
	Route::get('/posts/create', 'PostsController@create')->name('post-create');
	Route::post('/posts', 'PostsController@store')->name('post-store');
	Route::get('/posts/{post}', 'PostsController@show')->name('post-details');
	Route::post('/posts/{post}/comment', 'CommentsController@store')->name('comment-store');
	Route::get('/posts/tags/{tag}', 'TagsController@index')->name('posts-by-tags');


	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
});

/*Routes for API*/

/*Route::prefix('api')->group(function() {
	//Route::get('posts', 'Api\PostsController@index')->name('api-post-list');
	Route::get('post', function() {
		return new PostResource(Post::find(1));
	});

	Route::get('posts', function() {
		return new PostCollection(Post::paginate(10));
	});

	Route::get('user', function() {
		return new UserResource(User::find(1));
	});

	Route::get('users', function() {
		return new UserCollection(User::paginate(10));
	});
});*/
