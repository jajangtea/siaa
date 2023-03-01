<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // $jml_alumni = $this->getJmlAlumni();
        // $jml_siswa = $this->getJmlSiswa();


        // $data = [
        //     'controller'        => 'siswa',
        //     'title'             => 'Kelola Siswa',
        //     'jml_alumni' => $jml_alumni,
        //     'jml_siswa' => $jml_siswa,
        // ];
        return view('dashboard');
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
