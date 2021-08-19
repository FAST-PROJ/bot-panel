<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::find(1);

        $this->authorize('root', $config);

        return view('config.index', compact('config'));
    }

    public function update(ConfigRequest $request, int $id)
    {
        $this->authorize('root', Config::class);

        Config::find($id)->update($request->all());

        if ($request->file('path_image_login')) {
            $file = $request->file('path_image_login');
            $ext = $file->guessClientExtension();
            $path = $file->move('img/config', "logo.{$ext}");
            Config::where('id', 1)->update(['path_image_login' => "assets/images/logo.{$ext}"]);
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $ext = $file->guessClientExtension();
            $path = $file->move('img/config', "favicon.{$ext}");
            Config::where('id', 1)->update(['favicon' => "assets/images/favicon.{$ext}"]);
        }

        $this->flashMessage('check', 'Application settings updated successfully!', 'success');

        return redirect()->route('config');
    }
}
