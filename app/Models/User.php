<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
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

    public function student()
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'user_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }


    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

        public function isStudent(): bool
    {
        return $this->role === 'student';
    }
    
    public function isParent(): bool
    {
        return $this->role === 'parent';
    }
    

}
