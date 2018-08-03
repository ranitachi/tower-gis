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
Route::get('admin', array('as'=>'admin.dashboard','uses'=>'AdminController@index'))->middleware('auth');
Route::get('site',array('as'=>'admin','uses'=>'SiteController@index'))->middleware('auth');
Route::get('vendor',array('as'=>'admin','uses'=>'VendorController@index'))->middleware('auth');
Route::get('biaya',array('as'=>'admin','uses'=>'BiayaController@index'))->middleware('auth');
Route::get('operator',array('as'=>'admin','uses'=>'OperatorController@Operator'))->middleware('auth');

Route::get('biayadata',array('as'=>'admin','uses'=>'BiayaController@Data'))->middleware('auth');
Route::get('biayadatajenis/{id}/{jenis}',array('as'=>'admin','uses'=>'BiayaController@DataJenis'))->middleware('auth');
Route::get('biayaform/{id}',['as'=>'admin','uses'=>'BiayaController@Form'])->middleware('auth');
Route::post('biaya/simpan/{id}', ['as'=>'admin','uses'=>'BiayaController@Proccess'])->middleware('auth');
Route::get('biaya_hapus/{id}', ['as'=>'admin','uses'=>'BiayaController@Hapus'])->middleware('auth');
Route::get('biayaform/{id}', ['as'=>'admin','uses'=>'BiayaController@Form'])->middleware('auth');
Route::get('nilaiform/{id}', ['as'=>'admin','uses'=>'BiayaController@FormNilai'])->middleware('auth');
Route::get('nilaidata', ['as'=>'admin','uses'=>'BiayaController@DataNilai'])->middleware('auth');
Route::post('biaya/nilaisimpan/{id}', ['as'=>'admin','uses'=>'BiayaController@ProccessNilai'])->middleware('auth');

Route::get('dataoperator/{id}/{jenis}',['uses'=>'OperatorController@DataOperator'])->middleware('auth');
Route::get('json_operator/{id}/{datatable}',['uses'=>'OperatorController@OperatorJson'])->middleware('auth');
Route::get('operator_data',array('as'=>'admin','uses'=>'OperatorController@Operatordata'))->middleware('auth');
Route::get('operator_form/{id}',['as'=>'admin','uses'=>'OperatorController@Operatorform'])->middleware('auth');
Route::post('operator/simpan/{id}', ['as'=>'admin','uses'=>'OperatorController@Proccess'])->middleware('auth');
Route::get('operator_hapus/{id}', ['as'=>'admin','uses'=>'OperatorController@Hapus'])->middleware('auth');

Route::get('site_data',array('as'=>'admin','uses'=>'SiteController@Sitedata'))->middleware('auth');
Route::get('site_form/{id}',['as'=>'admin','uses'=>'SiteController@Siteform'])->middleware('auth');
Route::get('json_site/{id}/{datatable}',['uses'=>'SiteController@SiteJson']);
Route::post('site/simpan/{id}', ['as'=>'admin','uses'=>'SiteController@Proccess'])->middleware('auth');
Route::get('site-import',array('as'=>'admin','uses'=>'SiteController@Import'))->middleware('auth');
Route::get('site-hapus/{id}',array('as'=>'admin','uses'=>'SiteController@Hapus'))->middleware('auth');
Route::get('format-excel',array('as'=>'admin','uses'=>'SiteController@FileFormat'))->middleware('auth');
Route::post('format-excel',['as'=>'admin','uses'=>'SiteController@UploadFile'])->middleware('auth');
Route::get('showmap/{lat}/{long}',['uses'=>'SiteController@Showmap'])->middleware('auth');
Route::get('site-akurat/{id}/{status}/{kolom}',array('as'=>'admin','uses'=>'SiteController@EditAkurat'))->middleware('auth');
Route::get('site/cetaksite',array('as'=>'admin','uses'=>'SiteController@CetakSite'))->middleware('auth');
Route::post('site/cetak',array('as'=>'admin','uses'=>'SiteController@Cetak'))->middleware('auth');

Route::get('vendor_site/{id}/{jenis}',['uses'=>'SiteController@SiteByVendor'])->middleware('auth');
Route::get('vendor_site_operator/{id}/{jenis}',['uses'=>'SiteController@SiteByVendorOperator'])->middleware('auth');
Route::get('vendor_by_operator/{vendor_id}/{id}/{jenis}',['uses'=>'SiteController@SiteByOperator'])->middleware('auth');

Route::get('json_vendor/{id}/{datatable}',['uses'=>'VendorController@VendorJson'])->middleware('auth');
Route::get('vendor_data',array('as'=>'admin','uses'=>'VendorController@Vendordata'))->middleware('auth');
Route::get('vendor_form/{id}',['as'=>'admin','uses'=>'VendorController@Vendorform'])->middleware('auth');
Route::post('vendor/simpan/{id}', ['as'=>'admin','uses'=>'VendorController@Proccess'])->middleware('auth');
Route::get('vendor_hapus/{id}', ['as'=>'admin','uses'=>'VendorController@Hapus'])->middleware('auth');

Route::get('login', 'UserController@index')->name('login.index');
Route::post('login/authenticate', 'UserController@authenticate')->name('login.auth');
Route::get('logout', 'UserController@logout')->name('logout');

Route::get('user', 'UserController@manageuser')->name('user.manage');
Route::post('user', 'UserController@store')->name('user.store');
Route::get('user/bind/{id}', 'UserController@bind')->name('user.bind');
Route::post('user/update/{id}', 'UserController@update')->name('user.update');
Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
Route::get('user/status/{id}', 'UserController@changestatus')->name('user.status');

Route::get('imb-expired', 'IMBExpController@index')->name('imb.index');
Route::get('imb-update/{id}/{tanggal}', 'IMBExpController@update')->name('imb.update');

Route::get('kepaladinas', 'KepaladinasController@index')->name('kepaladinas.main')->middleware('auth');
Route::get('kepaladinas-form/{id}', 'KepaladinasController@form')->name('kepaladinas.form')->middleware('auth');
Route::get('kepaladinas-data', 'KepaladinasController@data')->name('kepaladinas.data')->middleware('auth');
Route::get('kepaladinas-hapus/{id}', ['uses'=>'KepaladinasController@hapus'])->middleware('auth');
Route::post('kepaladinas-simpan/{id}', ['uses'=>'KepaladinasController@process'])->middleware('auth');

Route::get('rekening', 'RekeningController@index')->name('rekening.main')->middleware('auth');
Route::get('rekening-form/{id}', 'RekeningController@form')->name('rekening.form')->middleware('auth');
Route::get('rekening-data', 'RekeningController@data')->name('rekening.data')->middleware('auth');
Route::get('rekening-hapus/{id}', ['uses'=>'RekeningController@hapus'])->middleware('auth');
Route::post('rekening-simpan/{id}', ['uses'=>'RekeningController@process'])->middleware('auth');

Route::get('skrd', 'SkrdController@index')->name('skrd.main')->middleware('auth');
Route::get('skrd-form/{id}', 'SkrdController@form')->name('skrd.form')->middleware('auth');
Route::get('skrd-data', 'SkrdController@data')->name('skrd.data')->middleware('auth');
Route::get('skrd-hapus/{id}', ['uses'=>'SkrdController@hapus'])->middleware('auth');
Route::post('skrd-sum', ['uses'=>'SkrdController@skrdsum'])->middleware('auth');
Route::get('skrd-cetak/{id}', ['uses'=>'SkrdController@skrdcetak'])->middleware('auth');
Route::get('skrd-laporan/{tahun}', ['uses'=>'SkrdController@skrdlaporan'])->middleware('auth');
Route::get('skrd-laporan-cetak/{tahun}', ['uses'=>'SkrdController@skrdlaporancetak'])->middleware('auth');
Route::get('skrd-laporan-data/{tahun}', ['uses'=>'SkrdController@skrdlaporandata'])->middleware('auth');
Route::post('skrd-simpan', ['uses'=>'SkrdController@process'])->middleware('auth');
