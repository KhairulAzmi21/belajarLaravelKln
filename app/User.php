<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    // Menetapkan nama table yang diwakili oleh model
    protected $table = 'users';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // Menetapkan connection database mana perlu digunakan
    // protected $connection = 'connection-name';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // Menetapkan sama ada ingin menggunakan created_at atau updated_at
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Membenarkan column database mana yang perlu dimasukkan
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // Menyembunyikan column dipaparkan pada objek
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
