<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AlumniModel;
use App\Models\KegiatanModel;
use App\Models\SiswaModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikanAlumniModel;

class Alumni extends BaseController
{

	protected $alumniModel;
	protected $siswaModel;
	protected $pendidikanAlumniModel;
	protected $pekerjaanModel;
	protected $kegiatanModel;
	protected $validation;
	protected $session;

	public function __construct()
	{
		$this->siswaModel = new SiswaModel();
		$this->alumniModel = new AlumniModel();
		$this->pendidikanAlumniModel = new PendidikanAlumniModel();
		$this->pekerjaanModel = new PekerjaanModel();
		$this->kegiatanModel = new KegiatanModel();
		$this->validation =  \Config\Services::validation();
		$this->session = session();
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
		$response = $data['data'] = array();
		$db      = \Config\Database::connect();
		$builder = $db->table('alumni');
		$builder->where('siswa.id_status', '2');
		$builder->select('siswa.nisn,siswa.nis,siswa.nama_lengkap,siswa.telepon,kegiatan.nama_kegiatan,tp.tahun_pelajaran,alumni.id,alumni.id_siswa');
		$builder->join('kegiatan', 'kegiatan.id = alumni.id_kegiatan');
		$builder->join('tp', 'tp.id = alumni.id_tp_lulus');
		$builder->join('siswa', 'siswa.id = alumni.id_siswa');
		$result = $builder->get();


		//$db      = \Config\Database::connect();
		// $sql = $db->getLastQuery();
		// echo $sql;

		// exit;


		// $result = $this->alumniModel->select()->findAll();
		//$ops .= '</div><a href="' . base_url('siswa/updatelulus/' . $value->id_siswa) . '" class="btn btn-warning float-right"><i class="fa fa-graduation-cap"></i> Lulus</button></div>';

		foreach ($result->getResult() as $key => $value) {
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class="btn  btn-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</button>';
			$ops .= '<button type="button" class="btn  btn-success" onClick="save(' . $value->id . ')"><i class="fa-solid fa-user"></i>   ' .  lang("App.detail")  . '</button>';
			$ops .= '<a href="' . base_url('alumni/kembalikan/' . $value->id_siswa) . '" class="btn btn-warning"><i class="fa fa-graduation-cap"></i> Kembalikan</a>';
			$ops .= '<button type="button" class="btn  btn-warning" onClick="simpan(' . $value->id_siswa . ')"><i class="fa-solid fa-wand-magic-sparkles"></i>Upload</button>';
			$ops .= '</div>';

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
			$response = [
				'success' => true,
				'data' => $this->validator->getErrors(),
				'msg' => "Image Failed to upload"
			];

			return $this->response->setJSON($response);
		} else {

			$id_siswa = $this->session->get('id_siswa');

			$imageFile = $this->request->getFile('file');
			$imageFile->move('uploads');
			$data = [
				'al_img' => $imageFile->getClientName(),
				'file'  => $imageFile->getClientMimeType(),
				'id_siswa' => $id_siswa

			];

			$db = db_connect();
			$sql = 'update alumni set al_img=:al_img:,file=:file: where id_siswa=:id_siswa:';
			$db->query($sql, $data);

			if ($db->query($sql, $data)) {
				// echo 'Success!';
				$response['success'] = true;
				$response['msg'] = "Image Succesfully uploaded";
				$response['messages'] = lang("App.update-success");
			} else {
				$response['success'] = true;
				$response['msg'] = "Image error uploaded";
				$response['messages'] = lang("App.update-success");
			}
		}
		return $this->response->setJSON($response);
	}


	public function kembalikan($id_siswa)
	{
		$response = array();
		$db      = \Config\Database::connect();
		$builder = $db->table('alumni');
		$builder->where('id_siswa', $id_siswa);
		$count = $builder->countAllResults();

		if ($count > 0) {

			$builder = $db->table('siswa');
			$builder->set('id_status', 1, false);
			$builder->where('id', $id_siswa);
			$builder->update();
			$response['success'] = true;
			$response['messages'] = lang("App.update-success");
		} else {

			$response['success'] = false;
			$response['messages'] = lang("App.update-error");
		}

		return redirect()->to(site_url('kelassiswa'));
	}

	public function login_alumni()
	{
		$data = [
			'controller'    	=> 'siswa',
			'title'     		=> 'Login Alumni'
		];
		helper(['form']);
		echo view('login', $data);
	}



	public function auth()
	{
		$nisn = $this->request->getVar('nisn');
		$password = $this->request->getVar('password');
		$db = db_connect();
		$sql = "select siswa.nama_lengkap,siswa.nisn,alumni.al_img as foto_terbaru,alumni.id as id_alumni,alumni.password,alumni.id_siswa from alumni INNER join siswa on siswa.id=alumni.id_siswa where siswa.nisn='" . $nisn . "' ";

		$data = $db->query($sql)->getRow();

		if ($data) {
			$pass = $data->password;
			$verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
					'nisn'     => $data->nisn,
					'id_siswa'     => $data->id_siswa,
					'password'    => $data->password,
					'nama_lengkap,' => $data->nama_lengkap,
					'foto_terbaru,' => $data->foto_terbaru,
					'logged_in'     => TRUE
				];
				
				$this->session->set($ses_data);
				return redirect()->to(base_url('alumni/dashboard'));
			} else {
				// $session->setFlashdata('msg', 'Wrong Password');
				// return redirect()->to('/login');
				echo "hasil : " . $verify_pass;
			}
		} else {
			$this->session->setFlashdata('msg', 'NISN tidak ditemukan');
			return redirect()->to(base_url('alumni/login_alumni'));
			// echo "hasil : ";
		}
	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('alumni/login_alumni'));
	}

	public function dashboard()
	{


		$response = $data['data'] = array();

		$db      = \Config\Database::connect();
		$builder = $db->table('siswa');
		$builder->where('siswa.nisn', $this->session->get('nisn'));
		$builder->select('alumni.id_siswa,siswa.nisn,siswa.nis,siswa.nama_lengkap,siswa.nama_ayah,siswa.nama_ibu,siswa.nama_wali,siswa.alamat,siswa.telepon,status.nama_status,siswa.id,tp.tahun_pelajaran,alumni.al_img as foto_terbaru,alumni.telepon as telepon_terbaru,alumni.alamat as alamat_terbaru,siswa.img as foto_lawas,kegiatan.nama_kegiatan');
		$builder->join('status', 'status.id = siswa.id_status');
		$builder->join('tp', 'tp.id = siswa.id_tp_masuk');
		$builder->join('alumni', 'alumni.id_siswa = siswa.id');
		$builder->join('kegiatan', 'kegiatan.id = alumni.id_kegiatan');


		$result = $builder->get()->getRow();

		$data = [
			'controller'    	=> 'alumni',
			'title'     		=> 'Dashboard Alumni',
			'biodata'			=> $result,
			'tp_lulus' 			=> $this->getTahunLulus(),
			'pendidikan' 		=> $this->getPendidikan(),
			'pekerjaan' 		=> $this->getPekerjaan(),
			'kegiatan' => $this->kegiatanModel->getKegiatan(),
			'tp' => $this->siswaModel->getTP(),

		];




		return view('alumni/dashboard', $data);
	}

	public function getTahunLulus()
	{

		$db      = \Config\Database::connect();
		$builder = $db->table('alumni');
		$builder->where('alumni.id_siswa', $this->session->get('id_siswa'));
		$builder->select('tp.tahun_pelajaran');
		$builder->join('tp', 'tp.id = alumni.id_tp_lulus');
		$result = $builder->get()->getRow();
		$tp_lulus = $result->tahun_pelajaran;
		return $tp_lulus;
	}

	public function getOne_alumni()
	{
		$response = array();

		$id = $this->session->get('id_siswa');

		if ($this->validation->check($id, 'required|numeric')) {
			$data = $this->alumniModel->where('id_siswa', $id)->first();
			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}





	public function getPendidikan()
	{
		$id = $this->session->get('id_siswa');

		$db      = \Config\Database::connect();
		$builder = $db->table('pendidikan');
		$builder->where('id_siswa', $id);
		$builder->select('*');
		$result = $builder->get()->getResult();

		return $result;
	}

	public function getPekerjaan()
	{
		$id = $this->session->get('id_siswa');

		$db      = \Config\Database::connect();
		$builder = $db->table('pekerjaan');
		$builder->where('id_siswa', $id);
		$builder->select('*');
		$result = $builder->get()->getResult();

		return $result;
	}

	public function edit_alumni()
	{
		$response = array();
		$fields['id'] = $this->request->getPost('id');
		$fields['id_kegiatan'] = $this->request->getPost('id_kegiatan');
		$fields['id_tp_lulus'] = $this->request->getPost('id_tp_lulus');
		$fields['telepon'] = $this->request->getPost('telepon');
		$fields['alamat'] = $this->request->getPost('alamat');


		$this->validation->setRules([

			'id_kegiatan' => ['label' => 'Id kegiatan', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'id_tp_lulus' => ['label' => 'Id tp lulus', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'telepon' => ['label' => 'Telepon', 'rules' => 'required|min_length[0]|max_length[20]'],
			'alamat' => ['label' => 'Alamat', 'rules' => 'required|min_length[0]|max_length[300]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->alumniModel->update($fields['id'], $fields)) {

				// $db      = \Config\Database::connect();
				// $sql = $db->getLastQuery();
				// echo $sql;
				// exit;

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		}

		return $this->response->setJSON($response);
	}
}
