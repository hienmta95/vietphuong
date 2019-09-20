<?php

Route::group(['middleware' => ['web'], 'prefix' => ''], function()
{

    Route::get('', 'HomepageController@index')->name('homepage');
    Route::get('/home', 'HomepageController@index')->name('homepage.home');

    Route::get('/sanpham', 'SanphamController@getList')->name('sanpham.list');
    Route::get('/sanpham/{id}/{slug}', 'SanphamController@getSanpham')->name('sanpham.get');
    Route::get('/loaisanpham/{id}/{slug}', 'SanphamController@getLoaisanpham')->name('loaisanpham.get');

    Route::get('/loaitintuc/{id}/{slug}', 'TintucController@getLoaitintuc')->name('loaitintuc.get');
    Route::get('/tintuc/{id}/{slug}', 'TintucController@getTintuc')->name('tintuc');

    Route::get('/loaibaiviet/{id}/{slug}', 'TintucController@getQuanhecodong')->name('loaiquanhecodong.get');
    Route::get('/baiviet/{id}/{slug}', 'TintucController@getCodong')->name('quanhecodong');

    Route::get('/gioithieu/{id}/{slug}', 'PageController@getGioithieu')->name('gioithieu.get');
    Route::get('/gioithieu', 'PageController@getGioithieuList')->name('gioithieu');

    Route::get('/hethongphanphoi/{id}/{slug}', 'PageController@getHethongphanphoi')->name('hethongphanphoi.get');

    Route::get('/thongtintuyendung', 'PageController@getTuyendunglist')->name('tuyendung');
    Route::get('/tuyendung/{id}/{slug}', 'PageController@getTuyendung')->name('tuyendung.get');

    Route::get('/tuvan', 'PageController@getTuvanlist')->name('tuvan');
    Route::get('/tuvan/{id}/{slug}', 'PageController@getTuvan')->name('tuvan.get');

    Route::get('/lienhe', 'FrontendController@getLienhe')->name('lienhe');
    Route::post('/lienhe', 'FrontendController@postLienhe')->name('post.lienhe');
    Route::get('/lienhethanhcong', 'FrontendController@getLienhethanhcong')->name('get.thanhcong');

    Route::get('/search', 'FrontendController@getSearch')->name('search');

    Route::get('/page/{id}/{slug}', 'FrontendController@getPage')->name('page');

    Route::get('/googlemap', 'FrontendController@getGoogle')->name('google');


    Route::get('/hinhanh', 'FrontendController@getHinhanh')->name('hinhanh');
    Route::get('/video', 'FrontendController@getVideo')->name('video');

});
