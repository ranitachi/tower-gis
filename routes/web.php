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

Route::get('/', array('as'=>'front','uses'=>'FrontController@index'));
Route::get('admin', array('as'=>'admin.dashboard','uses'=>'AdminController@index'));
Route::get('site',array('as'=>'admin','uses'=>'SiteController@index'));
Route::get('vendor',array('as'=>'admin','uses'=>'VendorController@index'));
Route::get('biaya',array('as'=>'admin','uses'=>'BiayaController@index'));
Route::get('operator',array('as'=>'admin','uses'=>'OperatorController@Operator'));

Route::get('biayadata',array('as'=>'admin','uses'=>'BiayaController@Data'));
Route::get('biayadatajenis/{id}/{jenis}',array('as'=>'admin','uses'=>'BiayaController@DataJenis'));
Route::get('biayaform/{id}',['as'=>'admin','uses'=>'BiayaController@Form']);
Route::post('biaya/simpan/{id}', ['as'=>'admin','uses'=>'BiayaController@Proccess']);
Route::get('biaya_hapus/{id}', ['as'=>'admin','uses'=>'BiayaController@Hapus']);

Route::get('dataoperator/{id}/{jenis}',['uses'=>'OperatorController@DataOperator']);
Route::get('json_operator/{id}/{datatable}',['uses'=>'OperatorController@OperatorJson']);
Route::get('operator_data',array('as'=>'admin','uses'=>'OperatorController@Operatordata'));
Route::get('operator_form/{id}',['as'=>'admin','uses'=>'OperatorController@Operatorform']);
Route::post('operator/simpan/{id}', ['as'=>'admin','uses'=>'OperatorController@Proccess']);
Route::get('operator_hapus/{id}', ['as'=>'admin','uses'=>'OperatorController@Hapus']);

Route::get('site_data',array('as'=>'admin','uses'=>'SiteController@Sitedata'));
Route::get('site_form/{id}',['as'=>'admin','uses'=>'SiteController@Siteform']);
Route::get('json_site/{id}/{datatable}',['uses'=>'SiteController@SiteJson']);
Route::post('site/simpan/{id}', ['as'=>'admin','uses'=>'SiteController@Proccess']);
Route::get('site-import',array('as'=>'admin','uses'=>'SiteController@Import'));
Route::get('site-hapus/{id}',array('as'=>'admin','uses'=>'SiteController@Hapus'));
Route::get('format-excel',array('as'=>'admin','uses'=>'SiteController@FileFormat'));
Route::post('format-excel',['as'=>'admin','uses'=>'SiteController@UploadFile']);
Route::get('showmap/{lat}/{long}',['uses'=>'SiteController@Showmap']);

Route::get('vendor_site/{id}/{jenis}',['uses'=>'SiteController@SiteByVendor']);
Route::get('vendor_site_operator/{id}/{jenis}',['uses'=>'SiteController@SiteByVendorOperator']);
Route::get('vendor_by_operator/{vendor_id}/{id}/{jenis}',['uses'=>'SiteController@SiteByOperator']);

Route::get('json_vendor/{id}/{datatable}',['uses'=>'VendorController@VendorJson']);
Route::get('vendor_data',array('as'=>'admin','uses'=>'VendorController@Vendordata'));
Route::get('vendor_form/{id}',['as'=>'admin','uses'=>'VendorController@Vendorform']);
Route::post('vendor/simpan/{id}', ['as'=>'admin','uses'=>'VendorController@Proccess']);
Route::get('vendor_hapus/{id}', ['as'=>'admin','uses'=>'VendorController@Hapus']);

Route::get('login', 'UserController@index')->name('login.index');
Route::post('login/authenticate', 'UserController@authenticate')->name('login.auth');
Route::get('logout', 'UserController@logout')->name('logout');

Route::get('user', 'UserController@manageuser')->name('user.manage');
