<?php

use Illuminate\Support\Facades\Route;   

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

/*----------Giao diện trang chủ----------*/
Route::get('/', 'FrontendController@index');

/*----------Danh mục sản phẩm----------*/
Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

/*----------Chi tiết sản phẩm----------*/
Route::get('detail/{id}/{slug}.html', 'FrontendController@detailProduct');

/*----------Chức năng bình luận----------*/
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');

/*----------Chức năng giỏ hàng----------*/
Route::group(['prefix'=>'cart'],function(){
    //Thêm giỏ hàng
    Route::get('add/{id}','CartController@getAddCart');
     //Show giỏ hàng
    Route::get('show','CartController@showCart');
     //Cập nhật số lượng sản phẩm trong giỏ hàng kiểu 1
    Route::get('update','CartController@getUpdateCart');
    //Cập nhật số lượng sản phẩm trong giỏ hàng kiểu 2
    Route::get('tang/{id}','CartController@tangCart');
    Route::get('giam/{id}','CartController@giamCart');
     //Xóa giỏ hàng
    Route::get('delete/{id}','CartController@getDeleteCart');
    //Gửi email xác nhận thanh toán
    Route::post('show','CartController@postComplete');
});
Route::get('complete','CartController@getcomplete');
Route::get('email','CartController@postComplete');



/*----------Chức năng đang nhập và giao diện ADMIN----------*/
Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');
    });

    Route::get('logout','HomeController@getLogOut');

    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
        Route::get('home','HomeController@getHome');

        //Danh muc
        Route::group(['prefix'=>'category'],function () {

            //Danh sach danh muc
            Route::get('/', 'CategoryController@getCate');

            //Them danh muc
            Route::post('/', 'CategoryController@postCate');

            //Sua danh muc
            Route::get('edit/{id}', 'CategoryController@getEditCate');
            Route::post('edit/{id}', 'CategoryController@postEditCate');

            //Xoa danh muc
            Route::get('delete/{id}', 'CategoryController@getDelCate');
        });

        //San pham
        Route::group(['prefix'=>'product'],function () {
            
            //Danh sach san pham
            Route::get('/', 'ProductController@getProduct');

            //Them san pham
            Route::get('add', 'ProductController@getAddProduct');
            Route::post('add', 'ProductController@postAddProduct');

            //Sua san pham
            Route::get('edit/{id}', 'ProductController@getEditProduct');
            Route::post('edit/{id}', 'ProductController@postEditProduct');

            //Xoa san pham
            Route::get('delete/{id}', 'ProductController@getDelProduct');
        });
    });
}); 