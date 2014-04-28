<?php namespace App\Modules\Permission\Seeds;
use App\Modules\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/26/14
 * Time: 9:10 AM
 */

class DatabaseSeeder extends \Seeder {

    public function run() {
        DB::table('group_permissions')->truncate();
        Permission::truncate();
        Permission::create(array(
            'permission_name'           =>  'Website.Backend.Login',
            'permission_description'    =>  'This is permission to View Admin',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.Users.Manager',
            'permission_description'    =>  'This is permission to manager users',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.Group.Manager',
            'permission_description'    =>  'This is permission to manager groups',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.Permission.Manager',
            'permission_description'    =>  'This is permission to manager permissions',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.Menu.Manager',
            'permission_description'    =>  'This is permission to manager menus',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.System.Manager',
            'permission_description'    =>  'This is permission to manager system',
            'user_id'                   =>  '1'
        ));

        Permission::create(array(
            'permission_name'           =>  'Permission.Options.Manager',
            'permission_description'    =>  'This is permission to manager options',
            'user_id'                   =>  '1'
        ));
        Permission::create(array(
            'permission_name'           =>  'Group.Administrator.Manager',
            'permission_description'    =>  'This is permission to manager options',
            'user_id'                   =>  '1'
        ));
        Permission::create(array(
            'permission_name'           =>  'Group.Users.Manager',
            'permission_description'    =>  'This is permission to manager options',
            'user_id'                   =>  '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '1',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '2',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '3',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '4',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '5',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '6',
            'group_id' => '1'
        ));
        DB::table('group_permissions')->insert(array(
            'permission_id' => '7',
            'group_id' => '1'
        ));

        DB::table('group_permissions')->insert(array(
            'permission_id' => '8',
            'group_id' => '1'
        ));

        DB::table('group_permissions')->insert(array(
            'permission_id' => '9',
            'group_id' => '1'
        ));
    }
}