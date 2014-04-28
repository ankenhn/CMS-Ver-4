<?php namespace App\Modules\User\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\HTML;


class User extends \Eloquent implements UserInterface, RemindableInterface {

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
    protected $fillable = array('first_name', 'last_name', 'email', 'password', 'birthday', 'avatar','group_id','last_login');

    public static $rules = array(
        'first_name'=>'required|alpha|min:2|max:50',
        'last_name'=>'required|alpha|min:2|max:50',
        'email'    => 'required|email|unique:users',
        'birthday'    => 'required|date',
        'password' => 'required',
    );

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
    public function getRememberToken()
    {
        return $this->token;
    }

    public function setRememberToken($value)
    {
        $this->token = $value;
    }

    public function getRememberTokenName()
    {
        return 'token';
    }

    public static function name($id =false,$anchor=false,$isAdmin=true) {
        $user = parent::find($id);
        $name =false;
        if($user) {
            $name = $user->first_name.' '.$user->last_name;
        }
        if(!$anchor) {
            return $name;
        }
        else {
            if($isAdmin AND $user) {
                return HTML::link(route('admin.user.profile',array($user->user_id)),$name);
            }
            else {
                return $name;
                //return route('user.profile')
            }
        }
        return false;
    }
}