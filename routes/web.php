<?php
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/projects', 'ProjectsController@index');
    Route::post('/projects', 'ProjectsController@store');
    Route::get('/projects/{project}', 'ProjectsController@show');
});
