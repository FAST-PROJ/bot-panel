<?php

namespace App\Http\Controllers;

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
        $uploadedFile = $request->file('arquivo');

        $fileContent = base64_encode($uploadedFile->getContent());
        $filename = time().'_'.$uploadedFile->getClientOriginalName();

        $client = new Client();

        $client->post(
            'https://spv-etl.herokuapp.com/insertFiles',
            [
                RequestOptions::JSON => [
                    'file_name' => $filename,
                    'file_content' => $fileContent,
                ],
            ]
        );

        return response()->json([
            'status' => true,
        ]);
    }
}
