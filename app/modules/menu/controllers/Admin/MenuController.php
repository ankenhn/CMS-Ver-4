<?php namespace App\Modules\Menu\Controllers\Admin;

use Auth, View, Lang, Monster, Datatable, Input, Validator;
use  App\Modules\Menu\Models\Menu;
use Illuminate\Support\Facades\Redirect;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:34 PM
 */

class MenuController extends \BackendController {

    public function __construct() {
        parent::__construct();
    }

    public function getDataTable() {
        return Datatable::collection(Menu::all())
            ->showColumns('menu_name')
            ->searchColumns('menu_name')
            ->orderColumns('menu_id','menu_name','latest_update','status')
            ->addColumn('status',function($item) {
                return Monster::status($item->status);
            })
            ->addColumn('latest_update',function($item) {
                return $item->updated_at->diffForHumans();
            })
            ->addColumn('action',function($item) {
                return '<a href="'.route('admin.menu.edit',array($item->menu_id)).'" class="btn-sm btn-primary"><i class="fa fa-edit"></i> '.Lang::get('monster.edit').'</a>&nbsp;<a href="'.route('admin.menu.manager',array($item->menu_id)).'" class="btn-sm btn-primary"><i class="fa fa-edit"></i> '.Lang::get('menu::monster.manager').'</a>';
            })
            ->make();
    }

    public function getList() {
        return View::make('menu::admin.list');
    }

    public function getCreate() {
        return View::make('menu::admin.update');
    }

    public function getEdit($id) {
        $menu = Menu::find($id);
        return View::make('menu::admin.update')->with('menu',$menu);
    }

    public function postUpdate($id=false) {
        if($this->checkValidator($id)) {
            $menu = Menu::firstOrNew(array('menu_id'=>$id));
            $menu->fill(Input::all());
            $menu->user_id = Auth::user()->user_id;
            $menu->save();
            return Redirect::route('admin.menu.edit',array($menu->menu_id));
        }
    }

    private function checkValidator($id=false) {

        $rules = Menu::$rules;
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            Monster::set_message(Lang::get('monster.updateSuccess'),'success');
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        if($id) { // if is editing
            return Redirect::route('admin.menu.edit',array($id));
        }
        else {
            return Redirect::to(route('admin.menu.create'))->withInput();
        }
    }

    public function getManager($id) {
        return View::make('menu::admin.manager');
    }
}