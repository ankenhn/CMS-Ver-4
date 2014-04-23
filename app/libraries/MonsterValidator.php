<?php namespace App\Libraries;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

/**
 * Author: Keith
 * Email: duyanh980@gmail.com
 * Date: 4/23/14
 * Time: 10:07 PM
 */

class MonsterValidator extends Validator {

    public function validateStripTags($attribute, $value, $parameters) {
        return strip_tags($value);
    }
}


class ValidationServiceProvider extends ServiceProvider {

    public function register(){}

    public function boot()
    {
        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
            return new MonsterValidator($translator, $data, $rules, $messages);
        });
    }

}