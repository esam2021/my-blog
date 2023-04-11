<?php

namespace App\Triats;

use Illuminate\Http\Request;

trait Upload
{
    public function uploadImage(Request $request, $folderName)
    {
        $path = $request->file('photo')->store($folderName, 'upload');
        return $path;
    }
}
