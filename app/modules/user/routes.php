<?php
/**
 * Created by PhpStorm.
 * User: Monster
 * Date: 4/17/14
 * Time: 12:20 AM
 */

Route::get('/',function() {
    return 'vvv';
});

Route::get('users',function() {
    return 'users list';
});

Route::group(array('prefix'=>'admin'),function() {
    Route::get('users',function() {
        return 'users manager';
    });
});