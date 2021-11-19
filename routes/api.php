<?php

use App\Models\Answer;
use App\Models\User;
use App\Notifications\BotNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/answer', function (Request $request) {
    try {
        $userId = $request->input('id');

        $answerID = Answer::create([
            'user_id' => $userId,
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        $user = User::find($userId);
        $user->notify(new BotNotification($user, $answerID));

        return Response::json(
            [
                'message' => 'Resposta salva com sucesso',
                'status' => true,
            ],
            200,
        );
    } catch (\Throwable $e) {
        return Response::json(
            [
                'message' => 'Erro ao salvar a resposta',
                'status' => false,
            ],
            400,
        );
    }
});
