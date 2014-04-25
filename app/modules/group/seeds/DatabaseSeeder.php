<?php namespace App\Modules\Group\Seeds;
use App\Modules\Group\Models\Group;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/25/14
 * Time: 11:37 PM
 */


class DatabaseSeeder extends \Seeder {

    public function run() {
        Group::truncate();
        Group::create(array(
            'group_name'   =>  'Administrator',
            'status' =>  '1',
            'user_id' =>  '1'
        ));
        Group::create(array(
            'group_name'   =>  'User',
            'status' =>  '1',
            'user_id' =>  '1'
        ));
    }
}