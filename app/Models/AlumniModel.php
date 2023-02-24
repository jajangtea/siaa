<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{

	protected $table = 'alumni';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_kegiatan', 'id_tp_lulus', 'al_img', 'id_siswa', 'password', 'file','telepon','alamat'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;

	public function getKegiatan()
	{

		$query = $this->db->query('select * from kegiatan');
		return $query->getResult();
	}
	public function getTahunPelajaran()
	{

		$query = $this->db->query('select * from tp');
		return $query->getResult();
	}
}
