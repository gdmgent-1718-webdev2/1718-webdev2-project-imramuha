<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'created_at', 'role_id',
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
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    // checks a role
    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    // checks a single specified role
    public function hasRole($role) {

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

        /**
     * Get the category that the product belongs to.
     */
    public function fishes()
    {
        return $this->hasMany(Fish::class);
    }


    /**
     * Get the roles of users.
     */
    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    
    /**
     * Get the category that the product belongs to.
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function setPasswordAttribute($value) {
         $this->attributes['password'] = bcrypt($value);
    }
}
