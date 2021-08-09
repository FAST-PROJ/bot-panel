<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('@bot', BotManController::class.'@startConversation');
