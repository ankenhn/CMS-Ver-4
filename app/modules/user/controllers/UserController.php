<?php namespace App\Modules\User\Controllers;
use App, View, Input, Auth, Monster;
use Illuminate\Support\Facades\Redirect, Hash;

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
        if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'), 'status'=>1),true)) {
            return Redirect::to('admin');
        }
        Monster::set_message('Email or password incorrect','error');
        return Redirect::to('login');
    }

}