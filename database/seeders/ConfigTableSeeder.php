<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::create([
            'long_app_name' => 'Senac Professor Virtual',
            'short_app_name' => 'SPV',
            'app_slogan' => 'Seu professor virtual',
            'captcha' => true,
            'datasitekey' => '',
            'recaptcha_secret' => '',
            'image_login' => true,
            'path_image_login' => 'assets/images/logo.png',
            'size_image_login' => '40',
            'title_login' => '<a href="#" ><b>Professor</b> Virtual</a>',
            'layout' => 'fixed',
            'skin' => 'blue',
            'favicon' => 'assets/images/favicon.ico',
        ]);
    }
}
