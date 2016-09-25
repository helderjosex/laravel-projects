<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'first_name','last_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function allUsers()
    {
        return self::all();
    }

    public function getUser($id)
    {
        $user = self::find($id);
        if(is_null($user))
        {
            return false;
        }
        return $user;
    }

    public function saveUser()
    {
        $request = Request::all();
        $request['password'] = Hash::make($request['password']);
        $user = new User();
        $user = $user->create($request);
        return $user;
    }

    public function updateUser($id)
    {
        $user = self::find($id);
        if(is_null($user)){
            return false;
        }
        $request = Request::all();
        if(isset($request['password']))
        {
          $request['password'] = Hash::make($request['password']);
        }
        $user->fill($request);
        $user->save();
        return $user;
    }

    public function deleteUser($id)
    {
        $user = self::find($id);
        if(is_null($user))
        {
            return false;
        }
        return $user->delete();
    }
}
