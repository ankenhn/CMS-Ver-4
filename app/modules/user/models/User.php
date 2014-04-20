<?php namespace App\Modules\User\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/17/14
 * Time: 9:58 PM
 */
class User extends \Eloquent {

    protected $table = 'users';
    protected $guarded = array('id');
    protected $hidden = array('first_name', 'last_name', 'email', 'password', 'birthday', 'avatar','group_id');

    protected $softDelete = true;

    public static $rules = array(
        'first_name'=>'required|alpha|min:2|max:50',
        'last_name'=>'required|alpha|min:2|max:50',
        'email'    => 'required|email|unique:users',
        'birthday'    => 'required|date',
        'password' => 'required',
    );


}