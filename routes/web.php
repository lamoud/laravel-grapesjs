<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => '\Lamoud\LaravelGrapesjs\Controllers',
    'middleware' => config('lamoud-grapesjs.middleware')
], function () {

    Route::get(config('lamoud-grapesjs.create_route'), 'GrapesjsController@getIndex')
        ->name('lamoud-grapesjs.create_route');

    Route::post(config('lamoud-grapesjs.create_route'), 'GrapesjsController@postIndex')
        ->name('lamoud-grapesjs.validate_create_route');
        
        
    Route::get(config('lamoud-grapesjs.update_route'), 'GrapesjsController@getUpdate')
        ->name('lamoud-grapesjs.update_route');

    Route::post(config('lamoud-grapesjs.update_route'), 'GrapesjsController@postUpdate')
        ->name('lamoud-grapesjs.validate_update_route');

});