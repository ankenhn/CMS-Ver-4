<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:32 PM
 */

Route::group(array('prefix'=>'admin','namespace'=>'App\\Modules\\Menu\\Controllers\\Admin'),function() {

    Route::get('menu',               array('as'   =>  'admin.menu.list',        'uses'  =>  'MenuController@getList'));
    Route::get('menu/dataTable',     array('as'   =>  'admin.menu.dataTable',   'uses'  =>  'MenuController@getDataTable'));
    Route::get('menu/create',        array('as'   =>  'admin.menu.create',      'uses'  =>  'MenuController@getCreate'));
    Route::get('menu/edit/{id}',     array('as'   =>  'admin.menu.edit',        'uses'  =>  'MenuController@getEdit'));
    Route::get('menu/manager/{id}',   array('as'   =>  'admin.menu.manager',      'uses'  =>  'MenuController@getManager'));
    Route::post('menu/update/{id?}', array('as'   =>  'admin.menu.update',      'uses'  =>  'MenuController@postUpdate'));

});