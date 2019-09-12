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
use thiagoalessio\TesseractOCR\TesseractOCR;
Route::get('/coba', function(){echo \OCR::scan('uploads/file/phone.png');});
Route::get('users', 'UsersController@index');
Route::get('/c-u','CompressUpload_C@default')->name('c-u');
Route::post('/c-u/upload','CompressUpload_C@upload');
Route::get('/c-u/log','CompressUpload_C@log');
Route::get('/notelepon', 'inputangka62_C@default');
Route::post('/notelepon/input', 'inputangka62_C@input');

Route::get('users-list', 'UsersController@usersList'); 
Route::resource('mahasiswa','Mahasiswa');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/ocr', function () {
    return view('lara_ocr.upload_image');
});
Route::post('/text', function () {
    return view('lara_ocr.parsed_text');
});