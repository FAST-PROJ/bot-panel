<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('file');
    }

    public function upload(Request $request)
    {
        try {
            if (!$request->has('arquivo')) {
                throw new Exception('Erro ao salvar o arquivo');
            }

            $uploadedFile = $request->file('arquivo');
            $fileContent = base64_encode($uploadedFile->getContent());
            $filename = time().'_'. pathinfo($uploadedFile->getClientOriginalName(), \PATHINFO_FILENAME);

            (new Client())->post(
                'https://spv-etl.herokuapp.com/insertFiles',
                [
                    RequestOptions::JSON => [
                        'file_name' => $filename,
                        'file_content' => $fileContent,
                    ],
                ]
            );

            $this->flashMessage('check', 'Arquivo salvo com sucesso', 'success');

            return redirect()->route('file.index');
        } catch (\Throwable $th) {
            $this->flashMessage('exclamation-triangle', 'Erro ao salvar o arquivo', 'danger');

            return redirect()->route('file.index');
        }
    }
}
