<?php namespace App\Modules\User;

class AuthServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		\Log::debug("AuthServiceProvider registered");
	}

}
