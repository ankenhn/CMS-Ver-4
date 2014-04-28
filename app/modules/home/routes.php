<?php 
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/17/14
 * Time: 9:35 PM
 */

Route::get('/',function() {
    return Redirect::to('login');
});

Route::group(array('prefix'=>'admin','before'=>'auth.admin','namespace'=>'App\\Modules\\Home\\Controllers\\Admin'),function() {
    Route::get('/',array('as'=>'admin.dashboard' , 'uses' =>  'HomeController@getDashboard'));
});