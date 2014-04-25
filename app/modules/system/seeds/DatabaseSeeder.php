<?php namespace App\Modules\System\Seeds;
use App\Modules\System\Models\System;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/25/14
 * Time: 11:31 PM
 */

class DatabaseSeeder extends \Seeder {

    public function run() {
        System::truncate();
        System::create(array(
            'key'   =>  'admin.menu',
            'value' =>  '1'
        ));
    }
}