<?php

namespace App;
use Alert;
use Illuminate\Support\Facades\Hash;

// use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    
    // use CrudTrait;
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'firstName', 'lastName', 'username', 'email', 'password', 'street', 'number', 'building', 'apartment', 'city', 'county', 'cartId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart', 'cartId'); 
    }

    // public function setPasswordAttribute($value){
        //$this->attributes['password'] = bcrypt($value);
    //     if(Hash::needsRehash($value)) 
    //     $password = Hash::make($value);

    //     $this->attributes['password'] = $value;
    // }

    public function setPasswordAttribute($value)
{
    return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
}
    // public function save(array $options = [])
    // {
    //     if (app('env') == 'production' &&
    //         !app()->runningInConsole() &&
    //         !app()->runningUnitTests()) {
    //         Alert::warning('User editing is disabled in the demo.');

    //         return true;
    //     }

    //     return parent::save($options);
    // }
}
