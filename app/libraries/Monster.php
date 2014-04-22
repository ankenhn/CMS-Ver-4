<?php namespace Monster;
use Illuminate\Support\Facades\Session, Config;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/20/14
 * Time: 9:16 PM
 */

class Monster {

    public static function set_message($message = '', $type ='',$isValidatorError = false,$headline = '') {
        if(is_array($message)) {
            $message = implode("",$message);
        }
        $header = null;
        if($isValidatorError == true) {
            $header = '<p><strong>Oh snap! Change a few things up and try submitting again. </strong></p>';
        }
        if($headline!='') {
            $header = '<p><strong>'.$headline.'</strong></p>';
        }
        $message = $header.$message;
        Session::flash('monster_message',$message);
        Session::flash('monster_message_class',$type);
    }

    public static function message() {
        if(!Session::get('monster_message')) {
            return;
        }
        $message = str_replace("{type}",Session::get('monster_message_class'),Config::get('message.format'));
        $message = str_replace("{message}",Session::get('monster_message'),$message);
        return $message;
    }

}