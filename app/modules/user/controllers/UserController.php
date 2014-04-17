<?php namespace App\Modules\User\Controllers;
use App, App\Modules\User\Models\User as User, View, Validator;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/17/14
 * Time: 8:33 PM
 */

class UserController extends \FrontendController {

    public function __construct() {
        parent::__construct();
    }

    public function getLogin() {
        return View::make('user::login');
    }
    public function postLogin() {
        $validator = Validator::make(
            array('name' => 'Dayle'),
            array('name' => 'required|min:5')
        );
        User::login(\Input::get('email'), \Input::get('password'));
    }

}