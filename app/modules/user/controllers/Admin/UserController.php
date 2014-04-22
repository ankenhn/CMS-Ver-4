<?php namespace App\Modules\User\Controllers\Admin;
use Monster\Monster;
use View, Validator, Input, Session;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/20/14
 * Time: 9:57 PM
 */

class UserController extends \FrontendController {

    public function getDataTable() {
        return Datatable::collection(User::all(array('id','email')))
            ->showColumns('id', 'email')
            ->searchColumns('email')
            ->orderColumns('id','email')
            ->make();
    }
    public function getList() {
        return View::make('user::admin.update');
    }

    public function getProfile($id) {
        return 'profile';
    }

    public function getCreate() {
        return View::make('user::admin.update');
    }

    public function getEdit($id = false) {
        $user = User::find($id);
        return View::make('user::admin.update')->with('user',$user);
    }

    public function postUpdate() {
        $validator = Validator::make(Input::all(),User::$rules);
        if ($validator->fails())
        {
            $messages = $validator->messages()->all('<p>:message</p>');
            Monster::set_message($messages,'error',true);
        }
    }
}