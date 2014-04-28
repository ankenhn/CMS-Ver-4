<?php 
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/26/14
 * Time: 1:45 PM
 */

Route::group(array('prefix'=>'admin', 'before'=>'auth.admin','namespace'=>'App\\Modules\\Option\\Controllers\\Admin'),function() {

    Route::get('option',               array('as'   =>  'admin.option.manager',        'uses'  =>  'OptionController@getManager'));
    Route::get('option/settings',     array('as'   =>  'admin.option.settings',   'uses'  =>  'OptionController@getSettings'));
});