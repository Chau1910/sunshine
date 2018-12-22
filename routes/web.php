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

/*
use App\Loai;

Route::get('/danhsachloai',function(){
    //Eloquent Model de lay du lieu
    //$ds_loai = Loai::all(); //select * from loai
    //$json = json_encode($ds_loai);
    //return $json;

    //Query Builder
    $ds_loai = DB::table('loai')->get();
    $json = json_encode($ds_loai);
    return $json;
});
*/
use App\ChuDe;

Route::get('/danhsachchude',function(){
    //$ds_cd = ChuDe::all();
    //$json = json_encode($ds_cd);
    //return $json;

    //Query Builder
    $ds_cd = DB::table('chude')->get();
    $json = json_encode($ds_cd);
    return $json;

});

//tencontroller@action
Route::get('/admin/danhsachloai', 'LoaiController@excel')->name('danhsachloai.excel');
Route::get('/admin/danhsachloai', 'LoaiController@index')->name('danhsachloai.index');
Route::get('/admin/danhsachloai/create', 'LoaiController@create')->name('danhsachloai.create');
Route::post('/admin/danhsachloai/create', 'LoaiController@store')->name('danhsachloai.store');
Route::get('/admin/danhsachloai/{id}', 'LoaiController@edit')->name('danhsachloai.edit');
Route::put('/admin/danhsachloai/{id}', 'LoaiController@update')->name('danhsachloai.update');
Route::delete('/admin/danhsachloai/{id}', 'LoaiController@destroy')->name('danhsachloai.destroy');

Route::get('/admin/danhsachchude', 'ChuDeController@index')->name('danhsachchude.index');

Route::get('/admin/danhsachsanpham', 'SanPhamController@index')->name('danhsachsanpham.index');

//route san pham
Route::get('/admin/danhsachsanpham/excel', 'SanPhamController@excel')->name('danhsachsanpham.excel');
Route::get('/admin/danhsachsanpham/pdf', 'SanPhamController@pdf')->name('danhsachsanpham.pdf');
Route::get('/admin/danhsachsanpham/print', 'SanPhamController@print')->name('danhsachsanpham.print');
Route::resource('/admin/danhsachsanpham', 'SanPhamController');

//route Frontend
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/gioi-thieu', 'FrontendController@about')->name('frontend.about');
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');


Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');

Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'FrontendController@orderFinish')->name('frontend.orderFinish');

// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'BaoCaoController@donhang')->name('baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'BaoCaoController@donhangData')->name('baocao.donhang.data');

//Tao route index adminlte
Route::get('/admin', 'BackendController@index')->name('admin.index');