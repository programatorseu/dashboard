<?php

Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store');

Route::get('/projects/{project}', 'ProjectsController@show');

