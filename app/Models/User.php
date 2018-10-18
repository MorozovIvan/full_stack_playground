<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword, Notifiable;

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var string[]
	 */
	protected $hidden = [
		'password', 'remember_token',
	];


	/**
	 * @param string $email
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null|static
	 */
	public static function findByEmail($email)
	{
		return static::where(compact('email'))->first();
	}

}
