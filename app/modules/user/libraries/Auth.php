<?php namespace App\Modules\User\Libraries;
use App\Modules\Group\Models\Group;
use App\Modules\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/25/14
 * Time: 11:26 PM
 */


class Auth extends \Illuminate\Support\Facades\Auth {

    public static function HasPermission($permission) {
        if(!Auth::check()) {
            return false;
        }
        $groupID = Auth::user()->group_id;
        $check = Permission::join('group_permissions','group_permissions.permission_id','=','permissions.permission_id')->where('group_id',$groupID)->where('permission_name',$permission)->first();
        if($check) {
            return true;
        }
        return false;
    }
}