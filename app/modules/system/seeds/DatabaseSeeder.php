<?php namespace App\Modules\System\Seeds;
use App\Modules\System\Models\System;
use Illuminate\Support\Facades\DB;

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
            'key'   =>  'site.title',
            'value' =>  'Monster CMS'
        ));
        System::create(array(
            'key'   =>  'site.keyword',
            'value' =>  'monster, jupitech, cms'
        ));
        System::create(array(
            'key'   =>  'site.description',
            'value' =>  'This is description'
        ));
        System::create(array(
            'key'   =>  'admin.menu',
            'value' =>  '1'
        ));
        System::create(array(
            'key'   =>  'upload.size',
            'value' =>  '2048'
        ));
        System::create(array(
            'key'   =>  'upload.image',
            'value' =>  'jpg,jpeg,png'
        ));
        System::create(array(
            'key'   =>  'upload.document',
            'value' =>  'doc, docx, xls, xlsx, pdf, ppt, pptx'
        ));
        System::create(array(
            'key'   =>  'upload.media',
            'value' =>  'mp3, mp4, avi, mkv, wav'
        ));
        System::create(array(
            'key'   =>  'site.notice',
            'value' =>  'This is Notice.'
        ));
    }
}