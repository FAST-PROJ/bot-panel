<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'my_progress' => [
                'finished' => 3,
                'started' => 12,
                'total' => 25,
                'rating' => 4,
            ],
            'in_progress' => [
                1 => [
                    'name' => 'PHP E TDD: Testes com PHPUnit',
                    'icon' => 'fa fa-book',
                    'progress' => '56',
                    'time_left' => carbon_human_print(1340),
                    'category_color' => 'blue',
                    'current_lesson' => 'Refatorando nosso código',
                    'current_time_left' => carbon_human_print(870),
                ],
                2 => [
                    'name' => 'React Native parte 1: Criando apps nativas com JavaScript e React',
                    'icon' => 'fa fa-book',
                    'progress' => '87',
                    'time_left' => carbon_human_print(354),
                    'category_color' => 'yellow',
                    'current_lesson' => 'Styled Components',
                    'current_time_left' => carbon_human_print(360),
                ],
            ],
            'forum' => [
                1 => [
                    'user' => 'Vinicius Alves',
                    'title' => 'Como usar o PHPUnit?',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    'datetime' => '2:15',
                ],
            ],
            'news' => [
                1 => [
                    'type' => 'podcast',
                    'name' => 'Agronegócio – Hipsters Deep Dive #006',
                    'time_left' => carbon_human_print(570),
                ],
            ],
        ];

        return view('home', compact('data'));
    }
}
