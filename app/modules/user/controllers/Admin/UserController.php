<?php namespace App\Modules\User\Controllers\Admin;
use Monster\Monster;
use View, Validator, Input, Datatable, App\Modules\User\Models\User, Lang;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/20/14
 * Time: 9:57 PM
 */

class UserController extends \BackendController {

    public function getDataTable() {
        return Datatable::collection(User::all())
            ->showColumns('first_name', 'last_name', 'email')
            ->searchColumns('first_name','last_name','email')
            ->addColumn('last_login',function($item) {
                //return $item->last_login->diffForHumans();
            })
            ->addColumn('status',function($item) {
                return Monster::status($item->status);
            })
            ->addColumn('action',function($item) {
                return '<a href="'.route('admin.permission.edit',array($item->permission_id)).'" class="btn-sm btn-primary"><i class="fa fa-edit"></i> '.Lang::get('monster.edit').'</a>';
            })
            ->orderColumns('first_name','last_name','email','last_login','status')
            ->make();
    }
    public function getList() {
        return View::make('user::admin.list');
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