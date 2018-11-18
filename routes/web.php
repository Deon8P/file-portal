<?php

use Dockable\Events\NewCollaboration;
use Dockable\Collaborator;
//Home Page
Route::get('/home', 'UsersController@checkAuth')->name('home');

//Users dashboard
Route::get('/home', 'FilesController@showFilesDefault');
Route::get('/dashboard', 'FilesController@showFilesDefault')->name('dashboard');
Route::get('/dashboard/{filter}', 'FilesController@showFiles');
Route::post('/dashboard/message', 'ChatsController@sendMessage');

//Global Files
Route::get('/global', 'FilesController@showGlobalFiles');

//File handeling and dashboard interactions (uploading downloading etc.)
Route::post('/files/store','FilesController@store');
Route::get('/files/{file}/makePrivate', 'FilesController@makeFilePrivate');
Route::get('/files/{file}/makeShared', 'FilesController@makeFileShared');
Route::post('/files/{file}/updateFile', 'FilesController@updateFile');
Route::post('/files/{file}/addCollaborators', 'FilesController@addCollaborators');
Route::post('/files/{file}/removeCollaborators', 'FilesController@removeCollaborators');
Route::post('/files/{file}/updateFileName', 'FilesController@updateFileName');
Route::get('/files/{file}/delete', 'FilesController@destroy');
Route::get('/files/{file}/download', 'FilesController@download');

//Register a user
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//Session creation (Login)
Route::get('/','SessionsController@create');
Route::get('/login','SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout','SessionsController@destroy');

/*
//Pusher testing
Route::get('/login', function(){
    NewCollaboration::dispatch(new collaborator(1));
    return Collaborator::latest()->pluck('user-name');
});


Route::post('/collaborator', function(){
    Collaborator::forceCreate(request(['body']));
});
*/

Route::get('/chats', 'ChatsController@index');
Route::get('/chats/{user}/view', 'ChatsController@getAllMessages');
Route::post('/chats/send/message', 'ChatsController@sendMessage');
