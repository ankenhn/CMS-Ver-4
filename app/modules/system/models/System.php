<?php namespace App\Modules\System\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/24/14
 * Time: 8:30 PM
 */


class System extends \Eloquent {

    protected $table = 'system';
    protected $primaryKey = 'key';
    protected $fillable = array('value');

    public static $rules = array(
        'key'=>'required|min:2|max:50|unique:system',
        'value'    =>  'required|min:8',
    );

    public static function item($key) {
        $res = System::find($key);
        if($res) {
            return $res->value;
        }
        return false;
    }


}