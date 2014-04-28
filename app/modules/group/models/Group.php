<?php namespace App\Modules\Group\Models;
use App\Modules\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/22/14
 * Time: 1:45 PM
 */


class Group extends \Eloquent {

    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $guarded = array('*');

    protected $fillable = array('group_name','status');

    //protected $dates = array('created_at', 'updated_at','deleted_at');

    protected $softDelete = true;

    public static $rules = array(
        'group_name'=>'required|min:2|max:50|unique:groups',
        'status'=>'required|integer',
    );

    public static function find($id=false,$column=array()) {
        $group = parent::find($id);
        self::get_group_permissions($group);
        return $group;
    }

    public static function get_group_permissions(&$group)
    {
        if ( ! is_object($group))
        {
            return;
        }

        $permission_array = array();

        // Grab our permissions for the role.
        $permissions = Permission::all();

        // Permissions
        foreach ($permissions as $key => $permission)
        {
            $permission_array[$permission->permission_name] = $permission;
        }

        $group->permissions = $permission_array;

        // Role Permissions
        $permission_array = array();
        $role_permissions = DB::table('group_permissions')->where('group_id',$group->group_id)->get();

        if (is_array($role_permissions) && count($role_permissions))
        {
            foreach ($role_permissions as $key => $permission)
            {
                $permission_array[$permission->permission_id] = 1;
            }
        }

        $group->group_permissions = $permission_array;
        unset($permission_array);

    }//end get_role_permissions()

    public function set_group_permission($groupID,$group_permissions) {
        DB::table('group_permissions')->where('group_id',$groupID)->delete();

        $permission_data = array();
        foreach( $group_permissions as $permission_id)
        {
            $permission_data[] = array('group_id' => $groupID, 'permission_id' => $permission_id);
        }
        DB::table('group_permissions')->insert($permission_data);
    }
}