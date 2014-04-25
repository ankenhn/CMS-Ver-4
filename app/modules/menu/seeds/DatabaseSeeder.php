<?php namespace App\Modules\Menu\Seeds;
use App\Modules\Menu\Models\Menu;
use App\Modules\Menu\Models\MenuItem;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/24/14
 * Time: 10:28 PM
 */

class DatabaseSeeder extends \Seeder {

    public function run() {
        Menu::truncate();
        MenuItem::truncate();
        Menu::create(array(
            'menu_name' => 'Admin Menu',
            'status' => '1',
            'user_id' => 1,
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Dashboard',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-home',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Users',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-user',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Groups',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-group',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Groups',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-group',
            'menu_item_parent_id'=> '3',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Permissions',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-home',
            'menu_item_parent_id'=> '3',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Menu',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-list',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Theme Options',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-tachometer',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
        MenuItem::create(array(
            'menu_item_name'    =>  'Settings',
            'menu_item_url'     =>  '/admin',
            'menu_item_class'   =>  'fa-gears',
            'menu_id'           =>  '1',
            'status'            =>  '1',
            'user_id'           =>  '1'
        ));
    }
}