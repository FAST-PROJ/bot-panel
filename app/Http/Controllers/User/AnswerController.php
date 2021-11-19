<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $answers = Answer::all()->where('user_id', $user->id);

        return view('answers.index', compact('answers'));
    }

    public function show($id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            $this->flashMessage('warning', 'Answer not found!', 'danger');

            return redirect()->route('user.answers');
        }

        return view('answers.show', compact('answer'));
    }
}
