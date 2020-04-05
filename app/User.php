<?php

namespace App;

use App\Mail\AccountCreated;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\HasApiTokens;
use ReflectionClass;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    public function getRouteKeyName()
    {
        return 'username';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'is_staff', 'is_active'
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
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->recordActivity('created');
        });

        static::saving(function ($user) {
            if (!$user->password) {
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz+-*^!';
                $password = substr(str_shuffle($permitted_chars), 0, 10);
                $user->password = Hash::make($password);
                Mail::to($user->email)->send(new AccountCreated($user, $password));
            }
        });
    }

    public function recordActivity($event)
    {
        Activity::create([
            'user_id' => Auth::id() ? Auth::id() : 1,
            'type' => $event . '_' . (new ReflectionClass($this))->getShortName(),
            'subject_type' => get_class($this),
            'subject_id' => $this->id,
        ]);
    }


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function token()
    {
        return $this->hasOne(Token::class);
    }

    public function filled_questionnaires()
    {
        return $this->hasMany(FilledQuestionnaire::class)->get();
    }
}
