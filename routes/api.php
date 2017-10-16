<?php

use Illuminate\Http\Request;

use App\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


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
