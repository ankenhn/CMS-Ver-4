<?php namespace App\Modules\Menu\Models;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class MenuItem extends \Eloquent {

    protected $table = 'menu_items';
    protected $primaryKey = 'menu_item_id';
    protected $fillable = array('menu_item_name','menu_item_url','menu_item_target','menu_item_class','status');

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
                $str .='<li class="dd-item" data-id="'.$var->menu_item_id.'">
                        <div class="dd-handle"><a href="'.route('admin.menu.update.item').'">'.$var->menu_item_name.'</a></div>';
                if(is_array($var->subCatalog)){
                    $str .= self::buildListMenuItemHtml($menu_id,$var->subCatalog,$var->menu_item_parent_id);
                }
                $str .='</li>';
            }
            $str .='</ol>';
        }
        return $str;
    }

    public static function listOrder($menu_id, $id=0,$parent_id=0) {
        $parent = self::orderBy('order')->where('menu_id','=',$menu_id)->where('menu_item_parent_id','=', $parent_id)->where('menu_item_id','!=',$id)->get();
        $category = array();
        if(!empty($parent)) {
            foreach($parent as $key => $var) {
                $category[$key] = $var;
                $category[$key]->subCatalog = self::listOrder($menu_id, $id,$var->menu_item_id);
            }
        }
        return $category;
    }


}