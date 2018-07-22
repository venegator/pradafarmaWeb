<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyOwnResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_path', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'rol',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function favoritos()
    {
        return $this->hasMany(Favorite::class);
    }

    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }

    public function avatar(){
        if(! $this->avatar_path){
            return 'avatars/default.png';
        }

        return $this->avatar_path;
    }

    public function isAdmin(){
        if($this->rol != "admin")
           {
            return false;
           } else {
            return true;
           }

    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Fetch the last published reply for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class)->latest();
    }
}
