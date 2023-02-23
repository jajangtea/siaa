<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AlumniModel;

class Alumni extends BaseController
{

	protected $alumniModel;
	protected $validation;

	public function __construct()
	{
		$this->alumniModel = new AlumniModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'alumni',
			'title'     		=> 'alumni',
			'kegiatan' => $this->alumniModel->getKegiatan(),
			'tp' => $this->alumniModel->getTahunPelajaran(),
		];

		return view('alumni', $data);
	}

	public function getAll()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('alumni');
		$builder->select('siswa.nisn,siswa.nis,siswa.nama_lengkap,siswa.telepon,kegiatan.nama_kegiatan,tp.tahun_pelajaran,alumni.id');
		$builder->join('kegiatan', 'kegiatan.id = alumni.id_kegiatan');
		$builder->join('tp', 'tp.id = alumni.id_tp_lulus');
		$builder->join('siswa', 'siswa.id = alumni.id_siswa');
		$result = $builder->get();


		// $result = $this->alumniModel->select()->findAll();

		foreach ($result->getResult() as $key => $value) {
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class="btn  btn-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</button>';
			$ops .= '<button type="button" class="btn  btn-success" onClick="save(' . $value->id . ')"><i class="fa-solid fa-user"></i>   ' .  lang("App.detail")  . '</button>';
			$ops .= '<button type="button" class="btn  btn-warning" onClick="save(' . $value->id . ')"><i class="fa-solid fa-wand-magic-sparkles"></i>   ' .  lang("App.back")  . '</button>';
			$ops .= '<button type="button" class="btn  btn-warning" onClick="simpan(' . $value->id . ')"><i class="fa-solid fa-wand-magic-sparkles"></i>Upload</button>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
				$value->nisn,
				$value->nis,
				$value->nama_lengkap,
				$value->telepon,
				$value->nama_kegiatan,
				$value->tahun_pelajaran,

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

			$data = $this->alumniModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['id_kegiatan'] = $this->request->getPost('id_kegiatan');
		$fields['id_tp_lulus'] = $this->request->getPost('id_tp_lulus');
		$fields['al_img'] = $this->request->getPost('al_img');
		$fields['id_siswa'] = $this->request->getPost('id_siswa');
		$fields['password'] = $this->request->getPost('password');


		$this->validation->setRules([
			'id_kegiatan' => ['label' => 'Id kegiatan', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'id_tp_lulus' => ['label' => 'Id tp lulus', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'al_img' => ['label' => 'Al img', 'rules' => 'required|min_length[0]|max_length[150]'],
			'id_siswa' => ['label' => 'Id siswa', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->alumniModel->insert($fields)) {

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
		helper(['form', 'url']);

		$database = \Config\Database::connect();
		$builder = $database->table('alumni');
		// $validateImage = $this->validate([
		// 	'file' => [
		// 		'uploaded[file]',
		// 		'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
		// 		'max_size[file, 4096]',
		// 	],
		// ]);

		$validationRule = [
			'file' => [
				'label' => 'Image File',
				'rules' => [
					'uploaded[file]',
					'is_image[file]',
					'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
					'max_size[file,100]',
					'max_dims[file,1024,768]',
				],
			],
		];

		// $response = [
		// 	'success' => false,
		// 	'data' => '',
		// 	'msg' => "Image could not upload"
		// ];

		if (!$this->validate($validationRule)) {
			$response = ['errors' => $this->validator->getErrors()];

			// return view('upload_form', $data);
		} else {

			$imageFile = $this->request->getFile('file');

			$imageFile->move(base_url('uploads'));
			$data = [
				'img_name' => $imageFile->getClientName(),
				'file'  => $imageFile->getClientMimeType()
			];
			$save = $builder->insert($data);
			$response = [
				'success' => true,
				'data' => $save,
				'msg' => "Image successfully uploaded"
			];
		}
		return $this->response->setJSON($response);
		// $response = array();

		// $fields['id'] = $this->request->getPost('id');
		// $fields['id_kegiatan'] = $this->request->getPost('id_kegiatan');
		// $fields['id_tp_lulus'] = $this->request->getPost('id_tp_lulus');
		// $fields['al_img'] = $this->request->getPost('al_img');
		// $fields['id_siswa'] = $this->request->getPost('id_siswa');
		// $fields['password'] = $this->request->getPost('password');


		// $this->validation->setRules([
		// 	'id_kegiatan' => ['label' => 'Id kegiatan', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'id_tp_lulus' => ['label' => 'Id tp lulus', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'al_img' => ['label' => 'Al img', 'rules' => 'required|min_length[0]|max_length[150]'],
		// 	'id_siswa' => ['label' => 'Id siswa', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[200]'],

		// ]);

		// if ($this->validation->run($fields) == FALSE) {

		// 	$response['success'] = false;
		// 	$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		// } else {

		// 	if ($this->alumniModel->update($fields['id'], $fields)) {

		// 		$response['success'] = true;
		// 		$response['messages'] = lang("App.update-success");
		// 	} else {

		// 		$response['success'] = false;
		// 		$response['messages'] = lang("App.update-error");
		// 	}
		// }

		// return $this->response->setJSON($response);
	}

	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->alumniModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function upload()
	{
		helper(['form', 'url']);

		$database = \Config\Database::connect();
		$builder = $database->table('alumni');
		// $validateImage = $this->validate([
		// 	'file' => [
		// 		'uploaded[file]',
		// 		'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
		// 		'max_size[file, 4096]',
		// 	],
		// ]);

		$validationRule = [
			'file' => [
				'label' => 'Image File',
				'rules' => [
					'uploaded[file]',
					'is_image[file]',
					'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
					'max_size[file,2000]',
					// 'max_dims[file,1024,768]',
				],
			],
		];


		if (!$this->validate($validationRule)) {
			// $response = ['msg' => $this->validator->getErrors()];
			$response = [
				'success' => true,
				'data' => $this->validator->getErrors(),
				'msg' => "Image Failed to upload"
			];

			return $this->response->setJSON($response);
		} else {

			$imageFile = $this->request->getFile('file');
			$imageFile->move(WRITEPATH . 'uploads');
			$data = [
				'al_img' => $imageFile->getClientName(),
				'file'  => $imageFile->getClientMimeType(),
				'id_kegiatan' => '1',
				'id_tp_lulus' => '1',
				'id_siswa' => '3'

			];
			$save = $builder->insert($data);

			$response = [
				'success' => true,
				'data' => $save,
				'msg' => "Image successfully uploaded"
			];
		}
		return $this->response->setJSON($response);
	}
}