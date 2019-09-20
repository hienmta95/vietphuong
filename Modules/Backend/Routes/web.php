<?php

Route::group(['prefix' => 'admin'], function() {

    config(['session.cookie' => 'vietphuong_admin_cookie']);

    Route::get('/login', 'BackendLoginController@showLoginForm')->name('backend.login');
    Route::post('/login', 'BackendLoginController@login')->name('backend.login.submit');
    Route::get('/logout', 'BackendLoginController@logout')->name('backend.logout');


    // image ajax
    Route::post('/bietthu/image/delete/{product_id}', 'BietthuController@deleteImage')->name('backend.bietthu.image.delete');
    Route::post('/upload', 'BietthuController@uploadImage')->name('backend.uploadPhoto');

    Route::group(['middleware' => ['adminLogin']], function() {

        Route::get('/', 'SanphamController@index')->name('backend.dashboard');

        // Management
        Route::get('/user', 'UserController@index')->name('backend.user.index');
        Route::get('/user/create', 'UserController@create')->name('backend.user.create');
        Route::post('/user', 'UserController@store')->name('backend.user.store');
        Route::get('/user/view/{id}', 'UserController@show')->name('backend.user.show');
        Route::get('/user/update/{id}', 'UserController@edit')->name('backend.user.edit');
        Route::put('/user/update/{id}', 'UserController@update')->name('backend.user.update');
        Route::delete('/user/delete/{id}', 'UserController@destroy')->name('backend.user.destroy');

        // Management
        Route::get('/slide', 'SlideController@index')->name('backend.slide.index');
        Route::get('/slide/create', 'SlideController@create')->name('backend.slide.create');
        Route::post('/slide', 'SlideController@store')->name('backend.slide.store');
        Route::get('/slide/view/{id}', 'SlideController@show')->name('backend.slide.show');
        Route::get('/slide/update/{id}', 'SlideController@edit')->name('backend.slide.edit');
        Route::put('/slide/update/{id}', 'SlideController@update')->name('backend.slide.update');
        Route::delete('/slide/delete/{id}', 'SlideController@destroy')->name('backend.slide.destroy');

        // Management
        Route::get('/page', 'PageController@index')->name('backend.page.index');
        Route::get('/page/create', 'PageController@create')->name('backend.page.create');
        Route::post('/page', 'PageController@store')->name('backend.page.store');
        Route::get('/page/view/{id}', 'PageController@show')->name('backend.page.show');
        Route::get('/page/update/{id}', 'PageController@edit')->name('backend.page.edit');
        Route::put('/page/update/{id}', 'PageController@update')->name('backend.page.update');
        Route::delete('/page/delete/{id}', 'PageController@destroy')->name('backend.page.destroy');

        // Management
        Route::get('/gioithieu', 'GioithieuController@index')->name('backend.gioithieu.index');
        Route::get('/gioithieu/create', 'GioithieuController@create')->name('backend.gioithieu.create');
        Route::post('/gioithieu', 'GioithieuController@store')->name('backend.gioithieu.store');
        Route::get('/gioithieu/view/{id}', 'GioithieuController@show')->name('backend.gioithieu.show');
        Route::get('/gioithieu/update/{id}', 'GioithieuController@edit')->name('backend.gioithieu.edit');
        Route::put('/gioithieu/update/{id}', 'GioithieuController@update')->name('backend.gioithieu.update');
        Route::delete('/gioithieu/delete/{id}', 'GioithieuController@destroy')->name('backend.gioithieu.destroy');

        // Management
        Route::get('/hinhanh', 'HinhanhController@index')->name('backend.hinhanh.index');
        Route::get('/hinhanh/create', 'HinhanhController@create')->name('backend.hinhanh.create');
        Route::post('/hinhanh', 'HinhanhController@store')->name('backend.hinhanh.store');
        Route::get('/hinhanh/view/{id}', 'HinhanhController@show')->name('backend.hinhanh.show');
        Route::get('/hinhanh/update/{id}', 'HinhanhController@edit')->name('backend.hinhanh.edit');
        Route::put('/hinhanh/update/{id}', 'HinhanhController@update')->name('backend.hinhanh.update');
        Route::delete('/hinhanh/delete/{id}', 'HinhanhController@destroy')->name('backend.hinhanh.destroy');

        // Management
        Route::get('/hethongphanphoi', 'HethongphanphoiController@index')->name('backend.hethongphanphoi.index');
        Route::get('/hethongphanphoi/create', 'HethongphanphoiController@create')->name('backend.hethongphanphoi.create');
        Route::post('/hethongphanphoi', 'HethongphanphoiController@store')->name('backend.hethongphanphoi.store');
        Route::get('/hethongphanphoi/view/{id}', 'HethongphanphoiController@show')->name('backend.hethongphanphoi.show');
        Route::get('/hethongphanphoi/update/{id}', 'HethongphanphoiController@edit')->name('backend.hethongphanphoi.edit');
        Route::put('/hethongphanphoi/update/{id}', 'HethongphanphoiController@update')->name('backend.hethongphanphoi.update');
        Route::delete('/hethongphanphoi/delete/{id}', 'HethongphanphoiController@destroy')->name('backend.hethongphanphoi.destroy');

        // Management
        Route::get('/nhamay', 'NhamayController@index')->name('backend.nhamay.index');
        Route::get('/nhamay/create', 'NhamayController@create')->name('backend.nhamay.create');
        Route::post('/nhamay', 'NhamayController@store')->name('backend.nhamay.store');
        Route::get('/nhamay/view/{id}', 'NhamayController@show')->name('backend.nhamay.show');
        Route::get('/nhamay/update/{id}', 'NhamayController@edit')->name('backend.nhamay.edit');
        Route::put('/nhamay/update/{id}', 'NhamayController@update')->name('backend.nhamay.update');
        Route::delete('/nhamay/delete/{id}', 'NhamayController@destroy')->name('backend.nhamay.destroy');

        // Management
        Route::get('/doitac', 'DoitacController@index')->name('backend.doitac.index');
        Route::get('/doitac/create', 'DoitacController@create')->name('backend.doitac.create');
        Route::post('/doitac', 'DoitacController@store')->name('backend.doitac.store');
        Route::get('/doitac/view/{id}', 'DoitacController@show')->name('backend.doitac.show');
        Route::get('/doitac/update/{id}', 'DoitacController@edit')->name('backend.doitac.edit');
        Route::put('/doitac/update/{id}', 'DoitacController@update')->name('backend.doitac.update');
        Route::delete('/doitac/delete/{id}', 'DoitacController@destroy')->name('backend.doitac.destroy');

        // Management
        Route::get('/lienhe', 'LienheController@index')->name('backend.lienhe.index');
        Route::get('/lienhe/create', 'LienheController@create')->name('backend.lienhe.create');
        Route::post('/lienhe', 'LienheController@store')->name('backend.lienhe.store');
        Route::get('/lienhe/view/{id}', 'LienheController@show')->name('backend.lienhe.show');
        Route::get('/lienhe/update/{id}', 'LienheController@edit')->name('backend.lienhe.edit');
        Route::put('/lienhe/update/{id}', 'LienheController@update')->name('backend.lienhe.update');
        Route::delete('/lienhe/delete/{id}', 'LienheController@destroy')->name('backend.lienhe.destroy');

        // Management
        Route::get('/loaisanpham', 'LoaisanphamController@index')->name('backend.loaisanpham.index');
        Route::get('/loaisanpham/create', 'LoaisanphamController@create')->name('backend.loaisanpham.create');
        Route::post('/loaisanpham', 'LoaisanphamController@store')->name('backend.loaisanpham.store');
        Route::get('/loaisanpham/view/{id}', 'LoaisanphamController@show')->name('backend.loaisanpham.show');
        Route::get('/loaisanpham/update/{id}', 'LoaisanphamController@edit')->name('backend.loaisanpham.edit');
        Route::put('/loaisanpham/update/{id}', 'LoaisanphamController@update')->name('backend.loaisanpham.update');
        Route::delete('/loaisanpham/delete/{id}', 'LoaisanphamController@destroy')->name('backend.loaisanpham.destroy');

        // Management
        Route::get('/loaitintuc', 'LoaitintucController@index')->name('backend.loaitintuc.index');
        Route::get('/loaitintuc/create', 'LoaitintucController@create')->name('backend.loaitintuc.create');
        Route::post('/loaitintuc', 'LoaitintucController@store')->name('backend.loaitintuc.store');
        Route::get('/loaitintuc/view/{id}', 'LoaitintucController@show')->name('backend.loaitintuc.show');
        Route::get('/loaitintuc/update/{id}', 'LoaitintucController@edit')->name('backend.loaitintuc.edit');
        Route::put('/loaitintuc/update/{id}', 'LoaitintucController@update')->name('backend.loaitintuc.update');
        Route::delete('/loaitintuc/delete/{id}', 'LoaitintucController@destroy')->name('backend.loaitintuc.destroy');

        // Management
        Route::get('/loaiquanhecodong', 'LoaiquanhecodongController@index')->name('backend.loaiquanhecodong.index');
        Route::get('/loaiquanhecodong/create', 'LoaiquanhecodongController@create')->name('backend.loaiquanhecodong.create');
        Route::post('/loaiquanhecodong', 'LoaiquanhecodongController@store')->name('backend.loaiquanhecodong.store');
        Route::get('/loaiquanhecodong/view/{id}', 'LoaiquanhecodongController@show')->name('backend.loaiquanhecodong.show');
        Route::get('/loaiquanhecodong/update/{id}', 'LoaiquanhecodongController@edit')->name('backend.loaiquanhecodong.edit');
        Route::put('/loaiquanhecodong/update/{id}', 'LoaiquanhecodongController@update')->name('backend.loaiquanhecodong.update');
        Route::delete('/loaiquanhecodong/delete/{id}', 'LoaiquanhecodongController@destroy')->name('backend.loaiquanhecodong.destroy');

        // Management
        Route::get('/quanhecodong', 'QuanhecodongController@index')->name('backend.quanhecodong.index');
        Route::get('/quanhecodong/create', 'QuanhecodongController@create')->name('backend.quanhecodong.create');
        Route::post('/quanhecodong', 'QuanhecodongController@store')->name('backend.quanhecodong.store');
        Route::get('/quanhecodong/view/{id}', 'QuanhecodongController@show')->name('backend.quanhecodong.show');
        Route::get('/quanhecodong/update/{id}', 'QuanhecodongController@edit')->name('backend.quanhecodong.edit');
        Route::put('/quanhecodong/update/{id}', 'QuanhecodongController@update')->name('backend.quanhecodong.update');
        Route::delete('/quanhecodong/delete/{id}', 'QuanhecodongController@destroy')->name('backend.quanhecodong.destroy');

        // Management
        Route::get('/sanpham', 'SanphamController@index')->name('backend.sanpham.index');
        Route::get('/sanpham/create', 'SanphamController@create')->name('backend.sanpham.create');
        Route::post('/sanpham', 'SanphamController@store')->name('backend.sanpham.store');
        Route::get('/sanpham/view/{id}', 'SanphamController@show')->name('backend.sanpham.show');
        Route::get('/sanpham/update/{id}', 'SanphamController@edit')->name('backend.sanpham.edit');
        Route::put('/sanpham/update/{id}', 'SanphamController@update')->name('backend.sanpham.update');
        Route::delete('/sanpham/delete/{id}', 'SanphamController@destroy')->name('backend.sanpham.destroy');

        // Management
        Route::get('/tintuc', 'TintucController@index')->name('backend.tintuc.index');
        Route::get('/tintuc/create', 'TintucController@create')->name('backend.tintuc.create');
        Route::post('/tintuc', 'TintucController@store')->name('backend.tintuc.store');
        Route::get('/tintuc/view/{id}', 'TintucController@show')->name('backend.tintuc.show');
        Route::get('/tintuc/update/{id}', 'TintucController@edit')->name('backend.tintuc.edit');
        Route::put('/tintuc/update/{id}', 'TintucController@update')->name('backend.tintuc.update');
        Route::delete('/tintuc/delete/{id}', 'TintucController@destroy')->name('backend.tintuc.destroy');

        // Management
        Route::get('/tuyendung', 'TuyendungController@index')->name('backend.tuyendung.index');
        Route::get('/tuyendung/create', 'TuyendungController@create')->name('backend.tuyendung.create');
        Route::post('/tuyendung', 'TuyendungController@store')->name('backend.tuyendung.store');
        Route::get('/tuyendung/view/{id}', 'TuyendungController@show')->name('backend.tuyendung.show');
        Route::get('/tuyendung/update/{id}', 'TuyendungController@edit')->name('backend.tuyendung.edit');
        Route::put('/tuyendung/update/{id}', 'TuyendungController@update')->name('backend.tuyendung.update');
        Route::delete('/tuyendung/delete/{id}', 'TuyendungController@destroy')->name('backend.tuyendung.destroy');

        // Management
        Route::get('/tuvan', 'TuvanController@index')->name('backend.tuvan.index');
        Route::get('/tuvan/create', 'TuvanController@create')->name('backend.tuvan.create');
        Route::post('/tuvan', 'TuvanController@store')->name('backend.tuvan.store');
        Route::get('/tuvan/view/{id}', 'TuvanController@show')->name('backend.tuvan.show');
        Route::get('/tuvan/update/{id}', 'TuvanController@edit')->name('backend.tuvan.edit');
        Route::put('/tuvan/update/{id}', 'TuvanController@update')->name('backend.tuvan.update');
        Route::delete('/tuvan/delete/{id}', 'TuvanController@destroy')->name('backend.tuvan.destroy');

        // Management
        Route::get('/section/{position}', 'SectionController@index')->name('backend.section.index');
        Route::get('/section/create/{position}', 'SectionController@create')->name('backend.section.create');
        Route::post('/section/{position}', 'SectionController@store')->name('backend.section.store');
        Route::get('/section/view/{position}/{id}', 'SectionController@show')->name('backend.section.show');
        Route::get('/section/update/{position}/{id}', 'SectionController@edit')->name('backend.section.edit');
        Route::put('/section/update/{position}/{id}', 'SectionController@update')->name('backend.section.update');
        Route::delete('/section/delete/{id}', 'SectionController@destroy')->name('backend.section.destroy');

        // Management
        Route::get('/thongtin', 'UserController@getThongtin')->name('backend.thongtin.edit');
        Route::put('/thongtin', 'UserController@postThongtin')->name('backend.thongtin.update');

        // Management
        Route::get('/menu', 'MenuController@index')->name('backend.menu.index');
        Route::get('/menu/create', 'MenuController@create')->name('backend.menu.create');
        Route::post('/menu', 'MenuController@store')->name('backend.menu.store');
        Route::get('/menu/view/{id}', 'MenuController@show')->name('backend.menu.show');
        Route::get('/menu/update/{id}', 'MenuController@edit')->name('backend.menu.edit');
        Route::put('/menu/update/{id}', 'MenuController@update')->name('backend.menu.update');
        Route::delete('/menu/delete/{id}', 'MenuController@destroy')->name('backend.menu.destroy');


    });
});
