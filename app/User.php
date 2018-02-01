<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'role', 'password',
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

      return $this->role;
   }

   public function userID(){

     return $this->id;
  }


   public function wallets(){

      return $this->hasMany(Wallet::class);
   }

    public function searchableAs() {

      return 'posts_index';

   }

   public function toSearchableArray() {
      $array = $this->toArray();

      return $array;
   }
}
