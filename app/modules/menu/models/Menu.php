<?php namespace App\Modules\Menu\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class Menu extends \Eloquent {

    protected $table = 'menus';
    protected $primaryKey = 'menu_id';
    protected $fillable = array('menu_name','status');

    protected $softDelete = true;

    public static $rules = array(
        'menu_name'=>'required|min:2|max:50',
        'status'=>'required|integer',
    );


}