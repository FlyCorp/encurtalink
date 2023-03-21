<?php

namespace App\Http\Sanitizers;

class SanitizerUser
{   

    public function postCreate(array $data)
    {   
        $name = $this->trimAll($data['name']);

        return [
            'password' => bcrypt('01012001'),
            'name' => mb_convert_case($name, MB_CASE_TITLE, 'UTF-8'),
            'email' => $data['email'],
        ];
    }

    public function postEdit(array $data)
    {   
        $name = $this->trimAll($data['name']);
        
        return [
            'name'      => mb_convert_case($name, MB_CASE_TITLE, 'UTF-8'),
            'email'     => $data['email'],
            'avatar'    => (!empty($data['avatar_name']))?$data['avatar_name']:null,
        ];
    }

    public function trimAll($string)
    {
        $clear = trim($string);

        if($clear)
        {
            $split  = explode(' ', $clear);
            $trim   = array_map(function($item) {return trim($item);}, $split);
            $filter = array_filter($trim);

            return implode(' ', $filter);
        }
        else
        {
            return $clear;
        }
    }

}
