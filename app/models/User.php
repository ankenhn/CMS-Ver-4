<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

<<<<<<< HEAD
use \Eloquent;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'user_id';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
// Added for Laravel 4.1.26 upgrade
=======
class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
>>>>>>> 0d9045df9ad2f0d8d819b5b30a2e02f124b5c3cd
    public function getRememberToken()
    {
        return $this->remember_token;
    }
<<<<<<< HEAD
=======

>>>>>>> 0d9045df9ad2f0d8d819b5b30a2e02f124b5c3cd
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
<<<<<<< HEAD
    public function getRememberTokenName()
    {
        return 'token';
=======

    public function getRememberTokenName()
    {
        return 'remember_token';
>>>>>>> 0d9045df9ad2f0d8d819b5b30a2e02f124b5c3cd
    }

}