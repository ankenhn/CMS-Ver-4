<?php namespace App\Modules\User\Libraries;
use App\Modules\User\Models\User, Hash;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/20/14
 * Time: 1:50 PM
 */

class Auth extends \Eloquent {

    public static function Login($email, $password='') {
        $user = User::where('email','=',$email)->first();
        if(Hash::check($password,$user->password)) {
            self::setup_session($user);
        }
        else {
        }
    }

    private static function setup_session($user) {

    }
}