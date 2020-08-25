<?php

namespace App;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements JWTSubject //, MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'perfil',
        'role',
        'photo_url',
    ];

    /**
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower($this->email)).'.jpg?s=200&d=mm';
    }

    /**
     * Retorna el perfil segun el tipo de usuario.
     *
     * @return \App\PerfilAspirante|\App\PerfilEmpresa
     */
    public function getPerfilAttribute()
    {
      if ($this->hasRole('empresa')) {
        return $this->perfil_empresa;
      }
      return $this->perfil_aspirante;
    }

    /**
     * Retorna el primer rol del user.
     *
     * @return string
     */
    public function getRoleAttribute()
    {
      if ($this->hasRole('empresa')) {
        return 'empresa';
      }
      return 'aspirante';
    }

    /**
     * Retorna el perfil de el usuario con rol aspirante
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perfil_aspirante()
    {
        return $this->hasOne(PerfilAspirante::class);
    }

    /**
     * Retorna el perfil de el usuario con rol empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perfil_empresa()
    {
        return $this->hasOne(PerfilEmpresa::class);
    }

    /**
     * Get the oauth providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oauthProviders()
    {
        return $this->hasMany(OAuthProvider::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
