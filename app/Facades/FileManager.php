<?php

namespace App\Facades;

class FileManager extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'filemanager';
    }
}