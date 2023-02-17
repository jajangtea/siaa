<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class KelassiswaModel extends Model
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
		$db = \Config\Database::connect();
	}

	protected $table = 'kelas_siswa';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_siswa', 'id_kelas'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;

	public function getSiswa()
	{

		$query = $this->db->query('select * from siswa');
		return $query->getResult();
	}
	public function getKelas()
	{

		$query = $this->db->query('select * from kelas');
		return $query->getResult();
	}

	public function user()
	{
		return $this->belongsTo('App\Models\Siswamodel');
	}
}
