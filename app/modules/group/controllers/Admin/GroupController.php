<?php namespace App\Modules\Group\Controllers\Admin;

use Auth, View, Lang, Monster, Datatable, Input, Validator;
use  App\Modules\Group\Models\Group;
use Illuminate\Support\Facades\Redirect;
use Menu\Menu;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:34 PM
 */

class GroupController extends \BackendController {

    public function __construct() {
        parent::__construct();
    }

    public function getDataTable() {
        return Datatable::collection(Group::all())
            ->showColumns('group_name')
            ->searchColumns('group_name')
            ->orderColumns('group_id','group_name','latest_update','status')
            ->addColumn('status',function($item) {
                return Monster::status($item->status);
            })
            ->addColumn('latest_update',function($item) {
                return $item->updated_at->diffForHumans();
            })
            ->addColumn('action',function($item) {
                return '<a href="'.route('admin.group.edit',array($item->group_id)).'" class="btn-sm btn-primary"><i class="fa fa-edit"></i> '.Lang::get('monster.edit').'</a>';
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
        $permissions_full = $group->permissions;
        $group_permissions = $group->group_permissions;
        $template = array();

        foreach ($permissions_full as $key => $perm) {
            $template[$perm->permission_name]['perm_id'] = $perm->permission_id;
            $template[$perm->permission_name]['value'] = 0;
            if(isset($group_permissions[$perm->permission_id]) )
            {
                $template[$perm->permission_name]['value'] = 1;
            }
        }

        $domains = array();
        foreach ($template as $key => $value) {
            list($domain, $name, $action) = explode('.', $key);
            if (!empty($domain) && !array_key_exists($domain, $domains)) {
                $domains[$domain] = array();
            }
            if (!isset($domains[$domain][$name])) {
                $domains[$domain][$name] = array(
                    $action => $value
                );
            }
            else {
                $domains[$domain][$name][$action] = $value;
            }

            // Store the actions separately for building the table header
            if (!isset($domains[$domain]['actions'])) {
                $domains[$domain]['actions'] = array();
            }

            if (!in_array($action, $domains[$domain]['actions'])) {
                $domains[$domain]['actions'][] = $action;
            }
        }//end foreach
        return View::make('group::admin.update')->with('group',$group)->with('domains',$domains);
    }

    public function postUpdate($id=false) {
        if($this->checkValidator($id)) {
            $user = Group::firstOrNew(array('group_id'=>$id));
            $user->fill(Input::all());
            $user->user_id = Auth::user()->user_id;
            $user->save();

            if(Auth::HasPermission("")) {
                $user->set_group_permission($id,Input::get('group_permissions'));
            }
            return Redirect::route('admin.group.edit',array($user->group_id));
        }

        if($id) { // if is editing
            return Redirect::route('admin.group.edit',array($id));
        }
        else {
            return Redirect::to(route('admin.group.create'))->withInput();
        }
    }

    private function checkValidator($id=false) {

        $rules = Group::$rules;
        if($id) {
            $rules['group_name'] = 'required|min:2|max:50|unique:groups,group_name,' .$id. ',group_id';
        }
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            Monster::set_message('Update Success','success');
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        return false;
    }
}