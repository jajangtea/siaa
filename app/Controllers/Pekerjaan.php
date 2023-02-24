<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PekerjaanModel;

class Pekerjaan extends BaseController
{

	protected $pekerjaanModel;
	protected $validation;

	public function __construct()
	{
		$this->pekerjaanModel = new PekerjaanModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'pekerjaan',
			'title'     		=> 'pekerjaan'
		];

		return view('pekerjaan', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->pekerjaanModel->select()->findAll();

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
				
				$value->nama_instansi,
				$value->jabatan,
				$value->nama_atasan,
				$value->alamat_instansi,
				$value->no_telepon,
				$value->id_alumni,
				$value->tahun_masuk,

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

			$data = $this->pekerjaanModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
	
		$fields['nama_instansi'] = $this->request->getPost('nama_instansi');
		$fields['jabatan'] = $this->request->getPost('jabatan');
		$fields['nama_atasan'] = $this->request->getPost('nama_atasan');
		$fields['alamat_instansi'] = $this->request->getPost('alamat_instansi');
		$fields['no_telepon'] = $this->request->getPost('no_telepon');
		$fields['id_alumni'] = $this->request->getPost('id_alumni');
		$fields['tahun_masuk'] = $this->request->getPost('tahun_masuk');


		$this->validation->setRules([
			
			'nama_instansi' => ['label' => 'Nama Instansi', 'rules' => 'required|min_length[0]|max_length[250]'],
			'jabatan' => ['label' => 'Jabatan', 'rules' => 'required|min_length[0]|max_length[200]'],
			'nama_atasan' => ['label' => 'Nama Atasan', 'rules' => 'required|min_length[0]|max_length[200]'],
			'alamat_instansi' => ['label' => 'Alamat Instansi', 'rules' => 'required|min_length[0]'],
			'no_telepon' => ['label' => 'No Telepon', 'rules' => 'required|min_length[0]|max_length[100]'],
			'id_alumni' => ['label' => 'Id alumni', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'tahun_masuk' => ['label' => 'Tahun Masuk', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->pekerjaanModel->insert($fields)) {

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
	
		$fields['nama_instansi'] = $this->request->getPost('nama_instansi');
		$fields['jabatan'] = $this->request->getPost('jabatan');
		$fields['nama_atasan'] = $this->request->getPost('nama_atasan');
		$fields['alamat_instansi'] = $this->request->getPost('alamat_instansi');
		$fields['no_telepon'] = $this->request->getPost('no_telepon');
		$fields['id_alumni'] = $this->request->getPost('id_alumni');
		$fields['tahun_masuk'] = $this->request->getPost('tahun_masuk');


		$this->validation->setRules([
		
			'nama_instansi' => ['label' => 'Nama Instansi', 'rules' => 'required|min_length[0]|max_length[250]'],
			'jabatan' => ['label' => 'Jabatan', 'rules' => 'required|min_length[0]|max_length[200]'],
			'nama_atasan' => ['label' => 'Nama Atasan', 'rules' => 'required|min_length[0]|max_length[200]'],
			'alamat_instansi' => ['label' => 'Alamat Instansi', 'rules' => 'required|min_length[0]'],
			'no_telepon' => ['label' => 'No Telepon', 'rules' => 'required|min_length[0]|max_length[100]'],
			'id_alumni' => ['label' => 'Id alumni', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'tahun_masuk' => ['label' => 'Tahun Masuk', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->pekerjaanModel->update($fields['id'], $fields)) {

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

			if ($this->pekerjaanModel->where('id', $id)->delete()) {

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
