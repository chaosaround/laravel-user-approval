<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Show unapproved message
Route::middleware(['auth'])->get('/unapproved', 'ApprovalMessagesController@unapproved')->name('approval.unapproved');

// All the routes that should be protected with user approval
Route::middleware(['approved', 'can:access-approved'])->group(function () {
	// Show approved message
	Route::get('/approved', 'ApprovalMessagesController@approved')->name('approval.approved');

	//
});

// Admin panel routes
Route::middleware(['can:access-admin'])->namespace('Admin')->prefix('admin')->group(function () {
	Route::put('users/{user}/approve', 'UserController@approve')->name('admin.users.approve');
	Route::put('users/{user}/unapprove', 'UserController@unapprove')->name('admin.users.unapprove');
	Route::resource('users', 'UserController')->only(['index'])->names([
		'index' => 'admin.users.index'
	]);

	//
});