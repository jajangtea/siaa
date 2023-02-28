<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class PendidikanAlumniModel extends Model {
    
	protected $table = 'pendidikan';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nama_kampus', 'fakultas', 'program_studi', 'jenjang', 'alamat_kampus', 'no_telepon', 'id_siswa', 'keterangan', 'tahun_masuk', 'tahun_lulus'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}