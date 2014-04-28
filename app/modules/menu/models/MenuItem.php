<?php namespace App\Modules\Menu\Models;
use Illuminate\Support\Facades\Request;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class MenuItem extends \Eloquent {

    protected $table = 'menu_items';
    protected $primaryKey = 'menu_item_id';
    protected $fillable = array('menu_item_name','menu_item_url','menu_item_target','menu_item_class','menu_id','menu_item_parent_id','status');

    protected $softDelete = true;

    protected static $menuItem = array();
    public static $rules = array(
        'menu_item_name'=>'required|max:50',
        'menu_item_url'=>'required|max:50',
        'menu_item_target'=>'required',
        'menu_item_class'=>'required',
        'status'=>'required|integer',
    );

    public static function buildListMenuItemHtml($menu_id,$catalog=false,$parent_id=0) {
        $str='';
        if(!is_array($catalog) AND $parent_id==0) {
            $catalog = self::listOrder($menu_id, $catalog);
        }
        if($catalog===false AND $parent_id==0) {
            $catalog = self::listOrder($menu_id);
        }
        if(!empty($catalog)) {
            $str .= '<ol class="dd-list">';
            foreach($catalog as $var) {
                $str .='<li class="dd-item dd3-item" data-id="'.$var->menu_item_id.'">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><a href="'.route('admin.menu.manager',array($var->menu_id,$var->menu_item_id)).'">'.$var->menu_item_name.'</a></div>';
                if(!empty($var->items)){
                    $str .= self::buildListMenuItemHtml($menu_id,$var->items,$var->menu_item_parent_id);
                }
                $str .='</li>';
            }
            $str .='</ol>';
        }
        return $str;
    }

    public static function listOrder($menu_id, $id=0,$parent_id=0,$listAll=true) {
        if(!$listAll) {
            $parent = MenuItem::orderBy('order')->where('status',1)->where('menu_id','=',$menu_id)->where('menu_item_parent_id','=', $parent_id)->where('menu_item_id','!=',$id)->get();
        }
        else {
            $parent = MenuItem::orderBy('order')->where('menu_id','=',$menu_id)->where('menu_item_parent_id','=', $parent_id)->where('menu_item_id','!=',$id)->get();
        }
        $category = array();
        if(!empty($parent)) {
            $module = Request::segment(1).'/'.Request::segment(2);
            foreach($parent as $key => $var) {
                $category[$key] = $var;
                $category[$key]->items = self::listOrder($menu_id, $id,$var->menu_item_id,$listAll);
                if(strpos($var->menu_item_url,$module)!==false) {
                    $active = true;
                }
                else {
                    $active = false;
                }
                if(!empty($category[$key]->items) AND $active==false) {
                    foreach($category[$key]->items as $item) {
                        if(strpos($item->menu_item_url,$module)!==false) {
                            $active = true;
                        }
                        else {
                            $active = false;
                        }
                    }
                }
                if(Request::segment(2)=='') {
                    if($parent_id==0 AND $key==0) {
                        $active=true;
                    }
                    else {
                        $active=false;
                    }
                }
                $category[$key]->active = $active;
            }
        }
        return $category;
    }


}