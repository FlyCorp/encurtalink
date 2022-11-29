<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileManager
{
    /**
     * Based APP_ENV return default file system used by application
     *
     * @return string
     */
    public function getFileSystem():string
    {
        //return (env('APP_ENV') == 'production') ? 's3' : 'public';
        return 'public';
    }
}