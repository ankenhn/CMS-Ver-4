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
    Route::controller('users', 'UserController', array(
        'getList'           => 'admin.user.list',
        'getDataTable'      => 'admin.user.dataTable',
        'getDelete'         => 'admin.user.delete',
        'getEdit'           => 'admin.user.edit',
        'getCreate'         => 'admin.user.create',
        'postUpdate'        => 'admin.user.update'
    ));
});