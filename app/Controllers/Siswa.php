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
		$response = $data['data'] = array();

		$result = $this->siswaModel->select()->findAll();

		foreach ($result as $key => $value) {

			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
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

				$ops
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
