<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Route::get('/', 'HomeController@getIndex');
Route::controller('technology','TechnologyController');
Route::controller('plot','PlotController');
Route::controller('automate','AutomateController');
Route::controller('files','FilesController');


Route::get('/ppt', 'HomeController@getPPT');
Route::get('/pptx', 'ResultController@createPPT');
Route::get('/operate/range-name', 'RangeController@showRangeName');
Route::get('/operate/range-name/add', 'RangeController@addRangeName');
Route::post('/operate/range-name/save', 'RangeController@saveRangeName');
Route::get('/operate/range-name/edit/{id}', 'RangeController@editRangeName');
Route::post('/operate/range-name/savechange', 'RangeController@savechangeRangeName');
Route::get('/operate/range-name/delete/{id}', 'RangeController@deleteRangeName');

Route::get('/operate/range-type', 'RangeController@showRangeType');
Route::get('/operate/range-type/add', 'RangeController@addRangeType');
Route::post('/operate/range-type/save', 'RangeController@saveRangeType');
Route::get('/operate/range-type/edit/{id}', 'RangeController@editRangeType');
Route::post('/operate/range-type/savechange', 'RangeController@savechangeRangeType');
Route::get('/operate/range-type/delete/{id}', 'RangeController@deleteRangeType');

Route::get('/operate/range-data', 'RangeController@showRangeData');



//  file
Route::get('/operate/data', 'FileController@getIndex');
Route::any('/operate/file', 'FileController@upload');
Route::any('/operate/upload', 'FileController@postUpload');


//process
Route::get('/operate/process', 'ProcessController@getIndex');
Route::get('/operate/process/add', 'ProcessController@getAdd');
//Route::post('/operate/process/save', 'ProcessController@doProcess');
Route::post('/operate/process/save', 'ProcessController@createPresentation');

//result
Route::get('/operate/result', 'ResultController@getIndex');


// delete image
Route::post('delete-image', function () {

    $destinationPath = public_path() . '/uploads/';
    File::delete($destinationPath . Input::get('file'));
    File::delete($destinationPath . "100x100_" . Input::get('file'));

    return Response::json('success', 200);
});
