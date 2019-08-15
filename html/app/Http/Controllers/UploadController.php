<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Upload\Store as StoreRequest;

class UploadController extends Controller
{
    /**
     * @param  StoreRequest  $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        $user = auth()->user();
        $directory = $user->id;
        $uploadedFile = $request->file('file');
        $path = \Storage::disk('public')->putFile($directory, $uploadedFile);
        $uploadedUrl = \Storage::disk('public')->url($path);

        return ['url' => $uploadedUrl];
    }
}
