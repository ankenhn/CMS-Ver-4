<?php namespace App\Modules\User\Seeds;
use Illuminate\Support\Facades\Hash;
use User;
/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/25/14
 * Time: 11:40 PM
 */


class DatabaseSeeder extends \Seeder {

    public function run() {
        User::truncate();
        User::create(array(
            'first_name'    =>  'The',
            'last_name'     =>  'Jupitech',
            'email'         =>  'admin@jupitech.sg',
            'password'      =>  Hash::make('admin@jpt'),
            'status'        =>  '1',
            'group_id'       =>  '1',
        ));
    }
}