<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:32 PM
 */

Route::group(array('prefix'=>'admin', 'before'=>'auth.admin','namespace'=>'App\\Modules\\Group\\Controllers\\Admin'),function() {

    Route::get('group',               array('as'   =>  'admin.group.list',        'uses'  =>  'GroupController@getList'));
    Route::get('group/dataTable',     array('as'   =>  'admin.group.dataTable',   'uses'  =>  'GroupController@getDataTable'));
    Route::get('group/create',        array('as'   =>  'admin.group.create',      'uses'  =>  'GroupController@getCreate'));
    Route::get('group/edit/{id}',     array('as'   =>  'admin.group.edit',        'uses'  =>  'GroupController@getEdit'));
    Route::post('group/update/{id?}', array('as'   =>  'admin.group.update',      'uses'  =>  'GroupController@postUpdate'));

});