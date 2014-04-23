<?php namespace App\Modules\Permission\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class Permission extends \Eloquent {

    protected $table = 'permissions';
    protected $primaryKey = 'permission_id';
    protected $fillable = array('permission_name','permission_description');
    protected $softDelete = true;

    public static $rules = array(
        'permission_name'=>'required|min:2|max:50|unique:permissions',
        'permission_description'    =>  'required|min:8',
        'status'=>'required|integer',
    );


}