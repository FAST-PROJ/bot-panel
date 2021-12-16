<?php

namespace App\Conversations\VirtualTeacher;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Auth;

class TeacherConversation extends Conversation
{
    public function askReason()
    {
        $user = Auth::user();

        $question = Question::create("Olá {$user->name}, em que posso ajudar?")
            ->fallback('Não é possível fazer perguntas')
            ->callbackId('ask_reason');

        return $this->ask($question, function (Answer $answer) {
            $text = $answer->getText();
            $this->say('Buscando respostas para sua pergunta. Só um momento.');
            $this->save($text);
        });
    }

    public function run()
    {
        $this->askReason();
    }

    private function save($text)
    {
        (new Client())->post(
            'https://spv-etl.herokuapp.com/recebePergunta',
            [
                RequestOptions::JSON => [
                    'id' => Auth::user()->id,
                    'question' => $text,
                ],
            ]
        );
    }
}
