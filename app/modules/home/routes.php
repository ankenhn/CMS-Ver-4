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

Route::group(array('prefix'=>'admin'),function() {
    Route::get('/',function() {
        return 'home manager';
    });
});