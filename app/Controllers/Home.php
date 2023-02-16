<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'controller'    	=> 'siswa',
            'title'     		=> 'Kelola Siswa'				
        ];
        return view('welcome_message',$data);
    }
}
