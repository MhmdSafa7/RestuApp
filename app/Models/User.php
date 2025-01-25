<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
<<<<<<< HEAD
    /** @use HasFactory<\Database\Factories\UserFactory> */
=======
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
=======
        'is_admin',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
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
=======
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

        public function isEditor()
    {
        return $this->role === 'editor';
    }

    public function isModerator()
    {
        return $this->role === 'moderator';
    }

>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
}
