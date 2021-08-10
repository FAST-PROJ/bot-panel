<?php

namespace App\Http\Controllers;

use App\Conversations\VirtualTeacher\TeacherConversation;
use BotMan\BotMan\BotMan;

class VirtualTeacherController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php.
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new TeacherConversation());
    }
}
