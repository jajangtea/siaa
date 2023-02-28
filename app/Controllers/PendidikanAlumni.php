<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PendidikanAlumniModel;

class PendidikanAlumni extends BaseController
{
	
    protected $pendidikanAlumniModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->pendidikanAlumniModel = new PendidikanAlumniModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'alumni/pendidikanAlumni',
                'title'     		=> 'Data Pendidikan Alumni'				
			];
		
		return view('alumni/pendidikanAlumni', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->pendidikanAlumniModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa fa-pen"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id .')"><i class="fa fa-pen-square"></i>   ' .  lang("App.edit")  . '</a>';
	
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id .')"><i class="fa fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
$value->nama_kampus,
$value->fakultas,
$value->program_studi,
$value->jenjang,
$value->alamat_kampus,
$value->no_telepon,
$value->id_alumni,
$value->keterangan,
$value->tahun_masuk,
$value->tahun_lulus,

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
			
			$data = $this->pendidikanAlumniModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['nama_kampus'] = $this->request->getPost('nama_kampus');
$fields['fakultas'] = $this->request->getPost('fakultas');
$fields['program_studi'] = $this->request->getPost('program_studi');
$fields['jenjang'] = $this->request->getPost('jenjang');
$fields['alamat_kampus'] = $this->request->getPost('alamat_kampus');
$fields['no_telepon'] = $this->request->getPost('no_telepon');
$fields['id_alumni'] = $this->request->getPost('id_alumni');
$fields['keterangan'] = $this->request->getPost('keterangan');
$fields['tahun_masuk'] = $this->request->getPost('tahun_masuk');
$fields['tahun_lulus'] = $this->request->getPost('tahun_lulus');


        $this->validation->setRules([
			            'nama_kampus' => ['label' => 'Nama Kampus', 'rules' => 'required|min_length[0]|max_length[200]'],
            'fakultas' => ['label' => 'Fakultas', 'rules' => 'required|min_length[0]|max_length[200]'],
            'program_studi' => ['label' => 'Program studi', 'rules' => 'required|min_length[0]|max_length[100]'],
            'jenjang' => ['label' => 'Jenjang', 'rules' => 'required|min_length[0]|max_length[20]'],
            'alamat_kampus' => ['label' => 'Alamat Kampus', 'rules' => 'required|min_length[0]'],
            'no_telepon' => ['label' => 'No telepon', 'rules' => 'required|min_length[0]|max_length[20]'],
            'id_alumni' => ['label' => 'Id alumni', 'rules' => 'required|min_length[0]|max_length[11]'],
            'keterangan' => ['label' => 'Keterangan', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'tahun_masuk' => ['label' => 'Tahun masuk', 'rules' => 'required|min_length[0]|max_length[11]'],
            'tahun_lulus' => ['label' => 'Tahun lulus', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->pendidikanAlumniModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
$fields['nama_kampus'] = $this->request->getPost('nama_kampus');
$fields['fakultas'] = $this->request->getPost('fakultas');
$fields['program_studi'] = $this->request->getPost('program_studi');
$fields['jenjang'] = $this->request->getPost('jenjang');
$fields['alamat_kampus'] = $this->request->getPost('alamat_kampus');
$fields['no_telepon'] = $this->request->getPost('no_telepon');
$fields['id_alumni'] = $this->request->getPost('id_alumni');
$fields['keterangan'] = $this->request->getPost('keterangan');
$fields['tahun_masuk'] = $this->request->getPost('tahun_masuk');
$fields['tahun_lulus'] = $this->request->getPost('tahun_lulus');


        $this->validation->setRules([
			            'nama_kampus' => ['label' => 'Nama Kampus', 'rules' => 'required|min_length[0]|max_length[200]'],
            'fakultas' => ['label' => 'Fakultas', 'rules' => 'required|min_length[0]|max_length[200]'],
            'program_studi' => ['label' => 'Program studi', 'rules' => 'required|min_length[0]|max_length[100]'],
            'jenjang' => ['label' => 'Jenjang', 'rules' => 'required|min_length[0]|max_length[20]'],
            'alamat_kampus' => ['label' => 'Alamat Kampus', 'rules' => 'required|min_length[0]'],
            'no_telepon' => ['label' => 'No telepon', 'rules' => 'required|min_length[0]|max_length[20]'],
            'id_alumni' => ['label' => 'Id alumni', 'rules' => 'required|min_length[0]|max_length[11]'],
            'keterangan' => ['label' => 'Keterangan', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'tahun_masuk' => ['label' => 'Tahun masuk', 'rules' => 'required|min_length[0]|max_length[11]'],
            'tahun_lulus' => ['label' => 'Tahun lulus', 'rules' => 'required|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->pendidikanAlumniModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->pendidikanAlumniModel->where('id', $id)->delete()) {
								
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
