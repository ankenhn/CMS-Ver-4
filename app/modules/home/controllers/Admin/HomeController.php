<?php namespace App\Modules\Home\Controllers\Admin;
use View;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/27/14
 * Time: 2:32 PM
 */

class HomeController extends \BackendController {

    public function __construct() {
        parent::__construct();
    }

    public function getDashBoard() {
        return View::make('home::admin.dashboard');
    }
}