<?php
Auth::routes();
Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store')->middleware('auth');
Route::get('/projects/{project}', 'ProjectsController@show');
