<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::prefix('divisions')->group(function(){
        Route::get('/view', 'Backend\DivisionController@view')->name('divisions.view');
        Route::get('/add', 'Backend\DivisionController@add')->name('divisions.add');
        Route::post('/store-student', 'Backend\DivisionController@store')->name('divisions.store');
        Route::get('/edit/{id}', 'Backend\DivisionController@edit')->name('divisions.edit');
        Route::post('/update/{id}', 'Backend\DivisionController@update')->name('divisions.update');
        Route::get('/delete/{id}', 'Backend\DivisionController@delete')->name('divisions.delete');       
    });

    Route::prefix('districts')->group(function(){
        Route::get('/view', 'Backend\DistrictController@view')->name('districts.view');
        Route::get('/add', 'Backend\DistrictController@add')->name('districts.add');
        Route::post('/store-student', 'Backend\DistrictController@store')->name('districts.store');
        Route::get('/edit/{id}', 'Backend\DistrictController@edit')->name('districts.edit');
        Route::post('/update/{id}', 'Backend\DistrictController@update')->name('districts.update');
        Route::get('/delete/{id}', 'Backend\DistrictController@delete')->name('districts.delete');       
    });

    Route::prefix('upazilas')->group(function(){
        Route::get('/view', 'Backend\UpazilaController@view')->name('upazilas.view');
        Route::get('/add', 'Backend\UpazilaController@add')->name('upazilas.add');
        Route::post('/store-student', 'Backend\UpazilaController@store')->name('upazilas.store');
        Route::get('/edit/{id}', 'Backend\UpazilaController@edit')->name('upazilas.edit');
        Route::post('/update/{id}', 'Backend\UpazilaController@update')->name('upazilas.update');
        Route::get('/delete/{id}', 'Backend\UpazilaController@delete')->name('upazilas.delete');       
    });

    Route::prefix('unions')->group(function(){
        Route::get('/view', 'Backend\UnionController@view')->name('unions.view');
        Route::get('/add', 'Backend\UnionController@add')->name('unions.add');
        Route::post('/store-student', 'Backend\UnionController@store')->name('unions.store');
        Route::get('/edit/{id}', 'Backend\UnionController@edit')->name('unions.edit');
        Route::post('/update/{id}', 'Backend\UnionController@update')->name('unions.update');
        Route::get('/delete/{id}', 'Backend\UnionController@delete')->name('unions.delete');       
    });

    Route::prefix('villages')->group(function(){
        Route::get('/view', 'Backend\VillageController@view')->name('villages.view');
        Route::get('/add', 'Backend\VillageController@add')->name('villages.add');
        Route::post('/store-student', 'Backend\VillageController@store')->name('villages.store');
        Route::get('/edit/{id}', 'Backend\VillageController@edit')->name('villages.edit');
        Route::post('/update/{id}', 'Backend\VillageController@update')->name('villages.update');
        Route::get('/delete/{id}', 'Backend\VillageController@delete')->name('villages.delete');       
    });

    Route::get('/get-district','Backend\DefaultController@getDistrict')->name('default.get-district');
    Route::get('/get-upazila','Backend\DefaultController@getUpazila')->name('default.get-upazila');
    Route::get('/get-union','Backend\DefaultController@getUnion')->name('default.get-union');

});
