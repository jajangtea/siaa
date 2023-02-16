<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KelassiswaModel;
use CodeIgniter\HTTP\RequestInterface;

class Kelassiswa extends BaseController
{

	protected $kelassiswaModel;
	protected $validation;

	public function __construct()
	{
		$this->kelassiswaModel = new KelassiswaModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{
		$this->kelassiswaModel = new kelassiswaModel();


		$data = [
			'controller'    	=> 'kelassiswa',
			'title'     		=> 'kelas_siswa',
			'siswa' => $this->kelassiswaModel->getSiswa(),
			'kelas' => $this->kelassiswaModel->getKelas(),
		];

		return view('kelassiswa', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->kelassiswaModel->select()->findAll();

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
				$value->id_siswa,
				$value->id_kelas,

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

			$data = $this->kelassiswaModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$id_siswas = $this->request->getPost('id_siswa');
		$id_kelas = $this->request->getPost('id_kelas');

		// var_dump($id_siswas);
		// exit;
		$this->validation->setRules([
			// 'id_siswa' => ['label' => 'Id siswa', 'rules' => 'required|min_length[0]|max_length[11]'],
			// 'id_kelas' => ['label' => 'Id kelas', 'rules' => 'required|min_length[0]|max_length[11]'],

		]);

		// if ($this->validation->run($fields) == FALSE) {

		// 	$response['success'] = false;
		// 	$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		// } else {
			if (!empty($id_siswas)) {
				foreach ($id_siswas as $id_siswa) {
					// echo $id_siswa;
					$data = [
						'id_siswa' => $id_siswa,
						'id_kelas' => $id_kelas,
					];
					// $this->db->table('kelas')->insert($data);
					$this->kelassiswaModel->insert($data);
				}
			}


			// if ($this->kelassiswaModel->insert($fields)) {

			// 	$response['success'] = true;
			// 	$response['messages'] = lang("App.insert-success");
			// } else {

			// 	$response['success'] = false;
			// 	$response['messages'] = lang("App.insert-error");
			// }
		

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['id_siswa'] = $this->request->getPost('id_siswa');
		$fields['id_kelas'] = $this->request->getPost('id_kelas');


		$this->validation->setRules([
			'id_siswa' => ['label' => 'Id siswa', 'rules' => 'required|min_length[0]|max_length[11]'],
			'id_kelas' => ['label' => 'Id kelas', 'rules' => 'required|min_length[0]|max_length[11]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->kelassiswaModel->update($fields['id'], $fields)) {

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

			if ($this->kelassiswaModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}

	// public function ajaxSearch()
	// {
	// 	helper(['form', 'url']);
	// 	$data = [];
	// 	$db      = \Config\Database::connect();
	// 	$builder = $db->table('siswa');

	// 	$query = $builder->like('nama_lengkap', $this->request->getVar('q'))
	// 		->select('id, nama_lengkap as text')
	// 		->limit(10)->get();
	// 	$data = $query->getResult();

	// 	echo json_encode($data);
	// }
}
