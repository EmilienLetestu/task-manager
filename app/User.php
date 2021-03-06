<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles): bool
    {
        if(is_array($roles)){
            foreach ($roles as $role){

                if($this->hasRole($role)){

                    return true;
                }
            }
        } else {

            if($this->hasRole($roles)){

                return true;
            }
        }

        return false;
    }


    /**
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        if($this->roles()->where('name', $role)->first()) {

            return true;
        }

        return false;
    }
}
