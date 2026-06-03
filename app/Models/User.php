<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

// tabel jamak -> users, model tunggalnya User
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    // protected $table = 'users';
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'int';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // fillable -> menentukan kolom mana yg bisa diinput user
    protected $fillable = [
        'npm',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    // hidden -> menetukan kolom mana yang disembunyikan di aplikasi laravel
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function fullName() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name
        );
    }
    
}
