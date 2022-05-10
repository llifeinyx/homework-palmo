<?php

namespace App\Services;

class FileHelperService
{
    public function saveFile($file, $path)
    {
        //$path = $request->file('inputAvatarItem')->storePublicly('avatars', 'public');
        return $file->storePublicly($path, 'public');
    }
}
