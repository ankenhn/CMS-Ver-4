<?php namespace App\Modules\Group\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class Group extends \Eloquent {

    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $guarded = array('*');

    protected $fillable = array('group_name','status');

    protected $dates = array('created_at', 'updated_at','deleted_at');

    protected $softDelete = true;

    public static $rules = array(
        'group_name'=>'required|min:2|max:50|unique:groups',
        'status'=>'required|integer',
    );


}