<?php namespace App\Modules\User\Controllers\Admin;
use View, User;
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
        return View::make('user::admin.list');
    }

    public function getUpdate() {
        return View::make('user::admin.update');
    }
}