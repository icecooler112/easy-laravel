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

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'userController@profile');
    Route::put('/editProfile', 'userController@editProfile');
    Route::get('/pass', 'resetpassController@pass');
    Route::post('/changepassword', 'resetpassController@changePass');

});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');

    });
});


Route::resource('/position', 'positionController');
Route::get('/position/{id}/delete','positionController@delete');

Route::resource('/department', 'departmentController');
Route::get('/department/{id}/delete','departmentController@delete');

Route::resource('/staff', 'staffController');
Route::get('/staff/{id}/delete','staffController@delete');

Route::resource('/user', 'userController');
Route::get('/user/{id}/delete','userController@delete');

Route::resource('/letter', 'letterController');

// ปกติ ถ้าไม่มีการส่งไอดีมา ค่ามันจะไปฟังก์ชั่นโชว์ แต่การทำ พีดีเอฟแบบไฟล์เดี่ยว ก็ต้องส่งไอดีข้อมูลที่ต้องการทำมานะ (เหมือนแก้ไข)
// อันนี้คือการปิดการแสดงผลฟังก์ชั่นโชว์ ทำให้ฟังก์ชั่นอื่นใช้งานได้
Route::resource('/report', 'reportController')->except(['show']);
Route::get('/report/pdf','reportController@createPDF');

Route::resource('/manageletter', 'manageletterController');
