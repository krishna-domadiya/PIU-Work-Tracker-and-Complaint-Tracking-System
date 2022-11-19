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
Route::get('/', function () {
    return view('pages.login');
});
Route::get('/index', function () {
    return view('pages.index');
});
Route::get('/addcomplain','superadminctr@selectcomplain');
Route::post('/addcomplain','superadminctr@addcomplain');
Route::get('/deletecomplain/{id}','superadminctr@deletecomplain');
Route::post('/addtype','superadminctr@addtype');
Route::get('/deletetype/{id}','superadminctr@deletetype');
Route::get('/viewcomplain','complaincontroller@index');
Route::get('/viewcomplain/{id}','complaincontroller@destroy');
Route::get('get-city-list','rolecontroller@getCityList');
// Route::get('get-type-list','admincontroller@getTypeList');
Route::get('user_type','admincontroller@user_type');
Route::get('/new','superadminctr@viewcomplain');
Route::post('/filterdate','superadminctr@filterdate');
Route::get('/app', function () {
    return view('layouts.app');
});
Route::get('/stylesheet', function () {
    return view('layouts.stylesheet');
});
Route::get('/header', function () {
    return view('layouts.header');
});
Route::get('/aside', function () {
    return view('layouts.aside');
});
Route::get('/registration','rolecontroller@index'); 
Route::post('store1','rolecontroller@store');
Route::get('/edit/{id}','complaincontroller@edit')->name('edit');
Route::get('/edit_admin/{id}','superadminctr@edit_admin');
Route::post('/update_admin/{rid}','superadminctr@update_admin');
Route::get('/edit_campuse/{id}','CampuseController@edit_campus');
Route::post('/update_campus/{id}','CampuseController@update_campus');
Route::get('/edit_staff_piu/{id}','admincontroller@edit_staff_piu');
Route::post('/update_staff_piu/{rid}','admincontroller@update_staff_piu');
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/admin1', function () {
    return view('layouts.asideadmin');
});
Route::post('/login','rolecontroller@login');
Route::post('/update/{cid}','complaincontroller@update');
Route::get('/add_admin','rolecontroller@add_admin');
Route::get('/logout', function () {
	Session::forget('rid');
	return redirect('/login');
});
Route::get('/setcomplete','piuauthctr@setcomplete');
Route::get('/addcampus','CampuseController@index'); 
Route::post('store','CampuseController@store');
Route::get('/addcampus/{id}','CampuseController@destroy');
Route::get('/admin','admincontroller@index');
Route::get('/admin/{rid}','admincontroller@index');
Route::get('viewtabledata','superadminctr@viewtabledata');
Route::get('/superadmin','superadminctr@viewcomplain');
Route::get('/piuauthority/dashboard','piuauthctr@index');
Route::get('/addpiustaff','piuauthctr@AddPiuStaff'); 
Route::get('/table_insert','gym@getdata');
Route::post('putdata','gym@putdata');
Route::get('/add staff piu','admincontroller@add_staff_piu');
Route::post('staff_piu','admincontroller@staff_piu');
Route::get('/managestaffpiu','admincontroller@manage_staff_piu');
Route::get('/manageadmin','superadminctr@manageadmin');
Route::get('/manageadmin/{id}','superadminctr@destroy');
Route::get('/showcomplain/{cid}','piuauthctr@show_complain');
Route::post('/approvedate/{cid}','piuauthctr@approvedate');
Route::get('/complains/{id}','piuauthctr@index1');
Route::post('/filter','admincontroller@filter');
Route::get('/map','piuauthctr@map');
//Route::get('/piuauthority/completedcomplains','piuauthctr@complete_comp');
Route::get('/send','MailController@emailsend');