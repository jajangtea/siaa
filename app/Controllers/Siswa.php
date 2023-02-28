<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\SiswaModel;

class Siswa extends BaseController
{

	protected $siswaModel;
	protected $validation;

	public function __construct()
	{
		$this->siswaModel = new SiswaModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'siswa',
			'title'     		=> 'Kelola Siswa'
		];

		return view('siswa', $data);
	}

	public function getAll()
	{

		// $result = $this->siswaModel->select()->findAll();

		$response = $data['data'] = array();

		// $result = $this->kelassiswaModel->select()->findAll();
		$db      = \Config\Database::connect();
		$builder = $db->table('siswa');
		$builder->where('siswa.id_status!=','2');
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



	public function getOne()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if ($this->validation->check($id, 'required|numeric')) {

			$data = $this->siswaModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}
	public function updatelulus($seg1)
	{
		$response = array();
		$db      = \Config\Database::connect();
		$builder = $db->table('alumni');
		$builder->where('id', $seg1);
		$count = $builder->countAllResults();

		if ($count == 0) {
			$db->table('alumni')->insert([
				'id_kegiatan'    => 1,
				'id_tp_lulus'   => 1,
				'id_siswa' => $seg1,
				'password'=>  password_hash("1234", PASSWORD_DEFAULT)
			]);

			$builder = $db->table('siswa');
			$builder->set('id_status', 2, false);
			$builder->where('id', $seg1);
			$builder->update();
			$response['success'] = true;
			$response['messages'] = lang("App.update-success");
		} else {

			$response['success'] = false;
			$response['messages'] = lang("App.update-error");
		}

		// return $this->response->setJSON($response);
		return redirect()->to(site_url('kelassiswa'));

		// Produces an integer, like 25

		// $builder->from('alumni');
		// echo $builder->countAllResults(); // Produces an integer, like 17

		// $response = array();

		// $id = $this->request->getPost('id');

		// if ($this->validation->check($id, 'required|numeric')) {
		// $db      = \Config\Database::connect();
		// $count = $this->siswaModel->where('id', $seg1)->first();
		// $count = $db->where('id', $seg1)->first();
		// $count = $this->db->countAllResults('');

		// 	return $this->response->setJSON($data);
		// } else {
		// 	throw new \CodeIgniter\Exceptions\PageNotFoundException();
		// }
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nis'] = $this->request->getPost('nis');
		$fields['nisn'] = $this->request->getPost('nisn');
		$fields['nama_lengkap'] = $this->request->getPost('nama_lengkap');
		$fields['nama_ayah'] = $this->request->getPost('nama_ayah');
		$fields['nama_ibu'] = $this->request->getPost('nama_ibu');
		$fields['nama_wali'] = $this->request->getPost('nama_wali');
		$fields['alamat'] = $this->request->getPost('alamat');
		$fields['telepon'] = $this->request->getPost('telepon');


		$this->validation->setRules([
			'nis' => ['label' => 'Nis', 'rules' => 'required|numeric|min_length[0]|max_length[11]|is_unique[siswa.nis,id,{id}]'],
			'nisn' => ['label' => 'Nisn', 'rules' => 'required|numeric|min_length[0]|max_length[11]|is_unique[siswa.nisn,id,{id}]'],
			'nama_lengkap' => ['label' => 'Nama lengkap', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_ayah' => ['label' => 'Nama ayah', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_ibu' => ['label' => 'Nama ibu', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_wali' => ['label' => 'Nama wali', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'alamat' => ['label' => 'Alamat', 'rules' => 'permit_empty|min_length[0]'],
			'telepon' => ['label' => 'Telepon', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->siswaModel->insert($fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nis'] = $this->request->getPost('nis');
		$fields['nisn'] = $this->request->getPost('nisn');
		$fields['nama_lengkap'] = $this->request->getPost('nama_lengkap');
		$fields['nama_ayah'] = $this->request->getPost('nama_ayah');
		$fields['nama_ibu'] = $this->request->getPost('nama_ibu');
		$fields['nama_wali'] = $this->request->getPost('nama_wali');
		$fields['alamat'] = $this->request->getPost('alamat');
		$fields['telepon'] = $this->request->getPost('telepon');


		$this->validation->setRules([
			'nis' => ['label' => 'Nis', 'rules' => 'required|numeric|min_length[0]|max_length[11]|is_unique[siswa.nis,id,{id}]'],
			'nisn' => ['label' => 'Nisn', 'rules' => 'required|numeric|min_length[0]|max_length[11]|is_unique[siswa.nisn,id,{id}]'],
			'nama_lengkap' => ['label' => 'Nama lengkap', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_ayah' => ['label' => 'Nama ayah', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_ibu' => ['label' => 'Nama ibu', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'nama_wali' => ['label' => 'Nama wali', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'alamat' => ['label' => 'Alamat', 'rules' => 'permit_empty|min_length[0]'],
			'telepon' => ['label' => 'Telepon', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->siswaModel->update($fields['id'], $fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->siswaModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}
}
