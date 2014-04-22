<?php namespace App\Modules\Group\Controllers\Admin;

use App, Auth, View, Validator, Input, Monster, App\Modules\Group\Models\Group;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Redirect,Datatable;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:34 PM
 */

class GroupController extends \BackendController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        parent::__construct();
    }

    public function getDataTable() {
        return Datatable::collection(Group::all())
            ->showColumns('group_name','status')
            ->searchColumns('group_name')
            ->orderColumns('group_id','group_name')
            ->addColumn('operations',function($model) {
                return HTML::link(route('admin.group.edit',array($model->group_id)),'Edit',array('title' => 'Edit Item'));
            })
            ->make();
    }
    public function getList() {
        return View::make('group::admin.list');
    }

    public function getCreate() {
        return View::make('group::admin.update');
    }

    public function getEdit($id) {
        $group = Group::find($id);
        return View::make('group::admin.update')->with('group',$group);
    }

    public function postUpdate($id=false) {
        if($this->checkValidator($id)) {
            $user = Group::firstOrNew(array('group_id'=>$id));
            $user->fill(Input::all());
            $user->save();
            return Redirect::route('admin.group.edit',array($user->group_id));
        }
    }

    private function checkValidator($id=false) {
        $rules = Group::$rules;
        if($id) {
            $user = Group::find($id);
            $rules['group_name'] = 'required|min:2|max:50|unique:groups,group_name,' .$user->group_name. ',group_id';
        }
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        if($id) { // if is editing
            return Redirect::route('admin.group.edit',array($id));
        }
        else {
            return Redirect::to(route('admin.group.create'))->withInput();
        }
    }
}