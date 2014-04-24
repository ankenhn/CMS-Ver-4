<?php
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:32 PM
 */

Route::group(array('prefix'=>'admin','namespace'=>'App\\Modules\\Menu\\Controllers\\Admin'),function() {
    Route::pattern('id', '[0-9]+');
    Route::get('menu',               array('as'   =>  'admin.menu.list',        'uses'  =>  'MenuController@getList'));
    Route::get('menu/dataTable',     array('as'   =>  'admin.menu.dataTable',   'uses'  =>  'MenuController@getDataTable'));
    Route::get('menu/create',        array('as'   =>  'admin.menu.create',      'uses'  =>  'MenuController@getCreate'));
    Route::get('menu/edit/{id}',     array('as'   =>  'admin.menu.edit',        'uses'  =>  'MenuController@getEdit'));
    Route::get('menu/manager/{id}/{item_id?}',   array('as'   =>  'admin.menu.manager',      'uses'  =>  'MenuController@getManager'));
    Route::post('menu/update/{id?}/{item_id?}', array('as'   =>  'admin.menu.update',      'uses'  =>  'MenuController@postUpdate'));
    Route::post('menu/update/item/{id?}/{item_id?}', array('as'    =>  'admin.menu.update.item',   'uses'  =>  'MenuController@postUpdateItem'));
    Route::post('menu/update/item/order', array('as'    =>  'admin.menu.order.item',   'uses'  =>  'MenuController@postOrderItem'));
});