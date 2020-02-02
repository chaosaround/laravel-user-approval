<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_approved' => 'boolean',
        'is_admin' => 'boolean'
    ];

	/**
	 * Is user approved?
	 *
	 * @return boolean
	 */
    public function isApproved() {
    	return $this->is_approved;
    }

	/**
	 * Approve user
	 */
    public function approve() {
    	$this->is_approved = true;
    	$this->save();
    }

	/**
	 * Unapprove user
	 */
	public function unapprove() {
		$this->is_approved = false;
		$this->save();
	}

	/**
	 * Is user admin?
	 *
	 * @return boolean
	 */
	public function isAdmin() {
		return $this->is_admin;
	}

}
