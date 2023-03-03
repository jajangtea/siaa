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
		$builder->where('id_status',$id_status);
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

		// $result = $this->siswaModel->select()->findAll();

		$response = $data['data'] = array();

		// $result = $this->kelassiswaModel->select()->findAll();
		$db      = \Config\Database::connect();
		$builder = $db->table('siswa');
		// $builder->where('siswa.id_status!=','2');
		$builder->select('siswa.nisn,siswa.nis,siswa.nama_lengkap,siswa.nama_ayah,siswa.nama_ibu,siswa.nama_wali,siswa.alamat,siswa.telepon,status.nama_status,siswa.id');
		$builder->join('status', 'status.id = siswa.id_status');
		$result = $builder->get();

		foreach ($result->getResult() as $key => $value) {

			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa fa-pen"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa fa-pen-square"></i>   ' .  lang("App.edit")  . '</a>';
	
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';




			$data['data'][$key] = array(
				$value->id,
				$value->nis,
				$value->nisn,
				$value->nama_lengkap,
				$value->nama_ayah,
				$value->nama_ibu,
				$value->nama_wali,
				$value->alamat,
				$value->telepon,
				$value->nama_status,

				$ops,
			);
		}

		return $this->response->setJSON($data);
	}
}
