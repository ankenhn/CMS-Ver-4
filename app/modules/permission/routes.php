<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:32 PM
 */

Route::group(array('prefix'=>'admin','namespace'=>'App\\Modules\\Permission\\Controllers\\Admin'),function() {

    Route::get('permission',               array('as'   =>  'admin.permission.list',        'uses'  =>  'PermissionController@getList'));
    Route::get('permission/dataTable',     array('as'   =>  'admin.permission.dataTable',   'uses'  =>  'PermissionController@getDataTable'));
    Route::get('permission/create',        array('as'   =>  'admin.permission.create',      'uses'  =>  'PermissionController@getCreate'));
    Route::get('permission/edit/{id}',     array('as'   =>  'admin.permission.edit',        'uses'  =>  'PermissionController@getEdit'));
    Route::post('permission/update/{id?}', array('as'   =>  'admin.permission.update',      'uses'  =>  'PermissionController@postUpdate'));

});