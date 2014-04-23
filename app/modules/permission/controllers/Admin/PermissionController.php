<?php namespace App\Modules\Permission\Controllers\Admin;

use Auth, View, Lang, Monster, Datatable, Input, Validator;
use  App\Modules\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:34 PM
 */

class PermissionController extends \BackendController {

    public function __construct() {
        parent::__construct();
    }

    public function getDataTable() {
        return Datatable::collection(Permission::all())
            ->showColumns('permission_name')
            ->searchColumns('permission_name')
            ->orderColumns('permission_id','permission_name','latest_update','status')
            ->addColumn('status',function($item) {
                return Monster::status($item->status);
            })
            ->addColumn('latest_update',function($item) {
                return $item->updated_at->diffForHumans();
            })
            ->addColumn('action',function($item) {
                return '<a href="'.route('admin.permission.edit',array($item->permission_id)).'" class="btn-sm btn-primary"><i class="fa fa-edit"></i> '.Lang::get('monster.edit').'</a>';
            })
            ->make();
    }
    public function getList() {
        return View::make('permission::admin.list');
    }

    public function getCreate() {
        return View::make('permission::admin.update');
    }

    public function getEdit($id) {
        $Permission = Permission::find($id);
        return View::make('permission::admin.update')->with('permission',$Permission);
    }

    public function postUpdate($id=false) {
        if($this->checkValidator($id)) {
            $user = Permission::firstOrNew(array('permission_id'=>$id));
            $user->fill(Input::all());
            $user->user_id = Auth::user()->user_id;
            $user->save();
            return Redirect::route('admin.permission.edit',array($user->permission_id));
        }
    }

    private function checkValidator($id=false) {

        $rules = Permission::$rules;
        if($id) {
            $rules['permission_name'] = 'required|min:2|max:50|unique:Permissions,permission_name,' .$id. ',permission_id';
        }
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            Monster::set_message('Update Success','success');
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        if($id) { // if is editing
            return Redirect::route('admin.permission.edit',array($id));
        }
        else {
            return Redirect::to(route('admin.permission.create'))->withInput();
        }
    }
}