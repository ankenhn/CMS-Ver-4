<?php namespace Monster;
use App\Modules\Menu\Models\MenuItem;
use Menu\Menu;
use Request;
use Illuminate\Support\Facades\Session, Config, Lang, System;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/20/14
 * Time: 9:16 PM
 */

class Monster {

    public static function status($status) {
        switch($status) {
            case 0:
                return '<span class="label  label-warning">'.Lang::get('monster.draft').'</span>';
                break;
            case 1:
                return '<span class="label  label-success">'.Lang::get('monster.publish').'</span>';
                break;
            case 2:
                return '<span class="label  label-info">'.Lang::get('monster.pendingReview').'</span>';
                break;
            default:
                return '<span class="label  label-danger">'.Lang::get('monster.unknown').'</span>';
                break;
        }
    }

    public static function set_message($message = '', $type ='',$isValidatorError = false,$headline = '') {
        if(is_array($message)) {
            $message = implode("",$message);
        }
        $header = null;
        if($isValidatorError == true) {
            $header = '<p><strong>Oh snap! Change a few things up and try submitting again. </strong></p>';
        }
        if($headline!='') {
            $header = '<p><strong>'.$headline.'</strong></p>';
        }
        $message = $header.$message;
        Session::flash('monster_message',$message);
        Session::flash('monster_message_class',$type);
    }

    public static function message() {
        if(!Session::get('monster_message')) {
            return;
        }
        $message = str_replace("{type}",Session::get('monster_message_class'),Config::get('message.format'));
        $message = str_replace("{message}",Session::get('monster_message'),$message);
        return $message;
    }

    public static function AdminMenu($config = array()) {
        $default = array(
            'container'         =>  '',
            'container_id'      =>  '',
            'container_class'   =>  '',
            'menu'              =>  'ul',
            'menu_class'        =>  'sidebar-menu',
            'menu_id'           =>  'nav-accordion',
        );

        $config = array_merge($default,$config);
        $menuID = System::item('admin.menu');
        $menus = MenuItem::listOrder($menuID,0,0,false);

        return self::buildMenuHTML($menus,$config);
    }

    public static function Menu($menuID) {
        return MenuItem::listOrder($menuID,0,0,false);
    }

    private static function buildMenuHTML($menus = array(),$config=array(),$depth =0) {
        $menu = null;
        if(!empty($menus)) {
            $menu_class = $config['menu_class'];
            if($depth!=0) {
                $menu_id = $config['menu_id'].'_'.$depth;
            }
            else {
                $menu_id = $config['menu_id'];
            }

            $menu = "<{$config['menu']} id='$menu_id' class='{$menu_class}'>";
            if($config['menu']=='ul') {
                $item_tag = 'li';
            }
            else {
                $item_tag = 'div';
            }
            foreach($menus as $item) {
                if($item->active==true) {
                    $class = ' active';
                }
                else {
                    $class = null;
                }
                if(!empty($item->items)) {
                    $item_class = 'class ="sub-menu dcjq-parent-li'.$class.'"';
                }
                else {
                    $item_class = 'class="'.$class.'"';
                }
                $menu .= "<$item_tag $item_class>";

                $menu .= "<a href='".url($item->menu_item_url)."' class='dcjq-parent".$class."'><i  class='fa ".$item->menu_item_class."'></i> $item->menu_item_name</a>";
                    if(!empty($item->items)) {
                        $config['menu_class'] = 'sub';
                        $menu .= self::buildMenuHTML($item->items,$config,++$depth);
                    }
                $menu .= "</$item_tag>";
            }
            $menu .= "</{$config['menu']}>";
        }
        return $menu;
    }

    public static function breadcrumb() {
        $str = '<ul class="breadcrumbs-alt">';
        $Segments = Request::segments();
        $totalSegments = count($Segments);
        if(!empty($Segments)) {
            $k=0;
            foreach($Segments as $segment) {
                ++$k;
                if($k==1) {
                    if($totalSegments==1) {
                        $str .='<li><a href="#" class="current"><i class="fa fa-home">&nbsp;</i> Dashboard</a></li>';
                    }
                    else {
                        $str .='<li><a href="'.route('admin.dashboard').'"><i class="fa fa-home">&nbsp;</i> Dashboard</a></li>';
                    }
                }
                else if($k>3) {
                    break;
                }
                else if($k==$totalSegments || $k==3) {
                    $str .='<li><a class="current" href="">'.ucfirst($segment).'</a></li>';
                }
                elseif($k>1) {
                    $str .='<li><a href="'.route('admin.dashboard').'/'.$segment.'">'.ucfirst($segment).'</a></li>';
                }
            }
        }
        $str .='</ul>';
        return $str;
    }

}