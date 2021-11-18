<?php

namespace App\Conversations\VirtualTeacher;

use App\Models\Question as QuestionModel;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
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
            $this->save($text);
            $this->say('Buscando respostas para sua pergunta. Só um momento.');
        });
    }

    public function run()
    {
        $this->askReason();
    }

    private function save($text)
    {
        QuestionModel::create([
            'user_id' => Auth::user()->id,
            'question' => $text,
            'status' => false,
        ]);
    }
}
