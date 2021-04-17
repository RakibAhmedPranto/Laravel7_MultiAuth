<?php
Route::get('adminLogin', 'Admin\LoginController@loginPage')->name('admin.loginPage');
Route::post('adminLogin', 'Admin\LoginController@login')->name('admin.login');



Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('adminRegister', 'AdminController@registerPage')->name('admin.registerPage');
    Route::post('adminLogout', 'AdminController@logout')->name('admin.logout');
    Route::post('adminRegister', 'AdminController@register')->name('admin.register');
});
