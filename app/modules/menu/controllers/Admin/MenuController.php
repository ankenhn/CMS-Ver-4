<?php namespace App\Modules\Menu\Controllers\Admin;
use App\Modules\Menu\Models\MenuItem;
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

    public function getManager($id,$item_id=false) {
        $item = MenuItem::find($item_id);
        return View::make('menu::admin.manager')->with('item',$item)->with('menuID',$id)->with('menuItemHtml',MenuItem::buildListMenuItemHtml($id));
    }

    public function postUpdate($id=false) {
        if($this->checkValidator()) {
            $menu = Menu::firstOrNew(array('menu_id'=>$id));
            $menu->fill(Input::all());
            $menu->user_id = Auth::user()->user_id;
            $menu->save();
            return Redirect::route('admin.menu.edit',array($menu->menu_id));
        }

        if($id) { // if is editing
            return Redirect::route('admin.menu.edit',array($id));
        }
        else {
            return Redirect::route('admin.menu.create')->withInput();
        }
    }

    public function postUpdateItem($id,$item_id=false) {
        if($this->checkItemValidator()) {
            if(Input::get('create')=='addNew') {
                $item_id=false;
            }
            $menuItem = MenuItem::firstOrNew(array('menu_item_id'=>$item_id));
            $menuItem->fill(Input::all());
            $menuItem->user_id = Auth::user()->user_id;
            $menuItem->menu_id = $id;
            $menuItem->save();
            $item_id = $menuItem->menu_item_id;
            return Redirect::route('admin.menu.manager',array($id,$item_id))->withInput();
        }

        if($item_id) { // if is editing
            return Redirect::route('admin.menu.manager',array($id,$item_id))->withInput();
        }
        else {
            return Redirect::route('admin.menu.manager',array($id))->withInput();
        }
    }

    public function postOrderItem() {
        $data = Input::get('menu');
        $this->doSorting($data);
    }

    private function doSorting($data,$parent_id=0) {
        if(!empty($data)) {
            $i=0;
            foreach($data as $item) {
                ++$i;
                $menuItem = MenuItem::find($item['id']);
                $menuItem->order = $i;
                $menuItem->menu_item_parent_id = $parent_id;
                $menuItem->save();
                if(isset($item['children'])) {
                    $this->doSorting($item['children'],$item['id']);
                }
            }
        }
    }
    private function checkItemValidator() {
        $rules = MenuItem::$rules;
        $validator = Validator::make(Input::all(),$rules);
        if($validator->passes()) {
            Monster::set_message(Lang::get('monster.updateSuccess'),'success');
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        return false;
    }
    private function checkValidator() {

        $rules = Menu::$rules;
        $validator = Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            Monster::set_message(Lang::get('monster.updateSuccess'),'success');
            return true;
        }
        $messages = $validator->messages()->all('<p>:message</p>');
        Monster::set_message($messages,'error',true);
        return false;
    }

}