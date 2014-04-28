<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/17/14
 * Time: 8:59 PM
 */


Route::get('login', array('as' => 'login' , 'uses' => 'App\\Modules\\User\\Controllers\\UserController@getLogin'));
Route::post('login', array('as' => 'login', 'uses'=> 'App\\Modules\\User\\Controllers\\UserController@postLogin'));

Route::group(array('prefix'=>'admin', 'before'=>'auth.admin', 'namespace'=>'App\\Modules\\User\\Controllers\\Admin'),function() {
    Route::get('user',                  array('as'   =>    'admin.user.list',        'uses'  =>  'UserController@getList'));
    Route::get('user/dataTable',        array('as'   =>    'admin.user.dataTable',   'uses'  =>  'UserController@getDataTable'));
    Route::get('user/profile/{id}',    array('as'   =>     'admin.user.profile',     'uses'  =>  'UserController@getProfile'));
    Route::get('user/create',           array('as'   =>    'admin.user.create',      'uses'  =>  'UserController@getCreate'));
    Route::get('user/edit/{id}',        array('as'   =>    'admin.user.edit',        'uses'  =>  'UserController@getEdit'));
    Route::post('user/update/{id?}',    array('as'   =>    'admin.user.update',      'uses'  =>  'UserController@postUpdate'));
});
