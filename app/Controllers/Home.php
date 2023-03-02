<?php

namespace App\Controllers;

use App\Models\KelassiswaModel;

class Home extends BaseController
{
    protected $kelassiswaModel;
    public function index()
    {
        $jml_alumni = $this->getJmlAlumni();
        $jml_siswa = $this->getJmlSiswa();


        $data = [
            'controller'        => 'siswa',
            'title'             => 'Kelola Siswa',
            'jml_alumni' => $jml_alumni,
            'jml_siswa' => $jml_siswa,
        ];
        return view('home', $data);
    }
    public function simple()
    {
       

        $data = [
            'controller'        => 'Home',
            'title'             => 'Daftar Siswa Perkelas',
    

        ];
        return view('simple', $data);
    }

    public function getJmlSiswa()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->selectCount('id_status');
        $builder->where('id_status', 1);
        $count = $builder->countAllResults();

        return $count;
    }

    public function getJmlAlumni()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->where('id_status', 2);
        $count = $builder->countAllResults();

        return $count;
    }
}
