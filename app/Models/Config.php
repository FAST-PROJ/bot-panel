<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'long_app_name',
        'short_app_name',
        'app_slogan',
        'captcha',
        'datasitekey',
        'recaptcha_secret',
        'image_login',
        'path_image_login',
        'size_image_login',
        'title_login',
        'layout',
        'skin',
        'favicon',
    ];

    public function hasCaptcha(): bool
    {
        return (bool) $this->captcha;
    }

    public function hasImageLogin(): bool
    {
        return (bool) $this->image_login;
    }
}
