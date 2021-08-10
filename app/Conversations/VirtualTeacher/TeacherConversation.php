<?php

namespace App\Conversations\VirtualTeacher;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;

class TeacherConversation extends Conversation
{
    /**
     * First question.
     */
    public function askReason()
    {
        $user = Auth::user();

        $question = Question::create("Olá {$user->name}, em que posso ajudar?")
            ->fallback('Não é possível fazer perguntas')
            ->callbackId('ask_reason');
        // ->addButtons([
        //     Button::create('Conte uma piada')->value('joke'),
        //     Button::create('Me dê uma quote extravagante')->value('quote'),
        // ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ('joke' === $answer->getValue()) {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else {
                    $this->say(Inspiring::quote());
                }
            }
        });
    }

    /**
     * Start the conversation.
     */
    public function run()
    {
        $this->askReason();
    }
}
