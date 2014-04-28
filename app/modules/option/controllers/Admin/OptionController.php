<?php namespace App\Modules\Option\Controllers\Admin;
use Illuminate\Support\Facades\View;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/26/14
 * Time: 1:46 PM
 */

class OptionController extends \BackendController {


    public function __construct() {
        parent::__construct();
    }

    public function getManager() {
        return View::make('option::admin.manager');
    }

    public function getSettings() {
        return View::make('option::admin.settings');
    }
}