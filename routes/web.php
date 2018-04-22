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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


///////////////////////
/// Admin
///////////////////////
Route::group(['prefix' => 'dashboard'], function(){

    Route::get('/', [
        'uses' => 'DashboardController@dashboardPage',
        'as' => 'dashboard'
    ]);
    
    /// Users
    Route::resource('users', 'UsersController');
    
    /// Channels
    Route::resource('channels', 'channelsController');
    
    /// Discussions
    Route::resource('discussions', 'discussionsController');
    
    /// Replies
    Route::resource('replies', 'repliesController');
    
    /// Likes
    Route::resource('likes', 'likesController');
    
    /// Watchers
    Route::resource('watchers', 'watchersController');
    
    
});


///////////////////////
/// Public
///////////////////////

/// home page
Route::get('/', [
    'uses' => 'frontendController@index',
    'as' => 'index'
]);

/// single page
Route::get('/single/{slug}', [
    'uses' => 'frontendController@singlePost',
    'as' => 'single'
]);

/// channel discussions
Route::get('/{channel}/discussions', [
    'uses' => 'frontendController@channelDiscussions',
    'as' => 'channel.discussions'
]);


/// create a  comment
Route::post('/reply', [
    'uses' => 'frontendController@addReply',
    'as' => 'reply'
]);


/// like a reply
Route::get('/like/{id}', [
    'uses' => 'frontendController@likeReply',
    'as' => 'reply.like'
]);
/// unlike a reply
Route::get('/unlike/{id}', [
    'uses' => 'frontendController@unlikeReply',
    'as' => 'reply.unlike'
]);


/// watch a discussion
Route::get('/watch/{id}', [
    'uses' => 'frontendController@watchDiscussion',
    'as' => 'watch'
]);
/// unwatch a discussion
Route::get('/unwatch/{id}', [
    'uses' => 'frontendController@unwatchDiscussion',
    'as' => 'unwatch'
]);


