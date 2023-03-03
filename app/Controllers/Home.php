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
    public function simpleSearch()
    {


        $data = [
            'controller'        => 'simple',
            'title'             => 'Pencarian Data',


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


    public function getAll()
    {
        $id_status = $this->request->getPost('id_status');
        $response = $data['data'] = array();

        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->where('id_status', $id_status);
        $builder->select('nisn,nama_lengkap');
        $results = $builder->get()->getResult();

        foreach ($results as $key => $value) {
            $data['data'][$key] = array(
                $value->nisn,
                $value->nama_lengkap,

            );
        }

        return $this->response->setJSON($results);
    }



    public function getSiswaOrAlumni()
    {
        $db = \Config\Database::connect();

        $query = $db->query('select * from siswa where id_status=1');
        return $query->getResult();
    }



    public function getAllPerson()
    {

        $response = $data['data'] = array();

        $db      = \Config\Database::connect();
        $builder = $db->table('kelas_siswa');
		$builder->select('kelas_siswa.id,siswa.nisn,siswa.nis,siswa.nama_lengkap,kelas.nama_kelas,kelas.fase,kelas_siswa.id_siswa,status.nama_status');
		$builder->join('siswa', 'siswa.id = kelas_siswa.id_siswa');
		$builder->join('kelas', 'kelas.id = kelas_siswa.id_kelas');
        $builder->join('status', 'status.id = siswa.id_status');
        $result = $builder->get();

        foreach ($result->getResult() as $key => $value) {

            $data['data'][$key] = array(
                $value->nisn,
                $value->nis,
                $value->nama_lengkap,
                $value->nama_kelas,
                $value->nama_status,

            );
        }

        return $this->response->setJSON($data);
    }
}
