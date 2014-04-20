<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/17/14
 * Time: 8:59 PM
 */


Route::get('login', array('as' => 'login' , 'uses' => 'App\\Modules\\User\\Controllers\\UserController@getLogin'));
Route::post('login', array('as' => 'login', 'uses'=> 'App\\Modules\\User\\Controllers\\UserController@postLogin'));
Route::group(array('prefix'=>'admin','namespace'=>'App\\Modules\\User\\Controllers\\Admin'),function() {
    Route::get('dataTable', array('as' => 'dataTable' , 'uses' => 'UserController@getDataTable'));
    Route::get('users', array('as' => 'users' , 'uses' => 'UserController@getList'));
    Route::get('users/update', array('as' => 'update' , 'uses' => 'UserController@getUpdate'));
});