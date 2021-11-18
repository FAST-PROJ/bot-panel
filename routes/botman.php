<?php

use App\Http\Controllers\VirtualTeacherController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('@prof', VirtualTeacherController::class.'@startConversation');
