<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model {
    
	protected $table = 'siswa';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nis', 'nisn', 'nama_lengkap', 'nama_ayah', 'nama_ibu', 'nama_wali', 'alamat', 'telepon'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    

	public function kelassiswa()
    {
        return $this->belongsTo('kelassiswa', 'App\Models\Kelassiswa');
        // $this->belongsTo('propertyName', 'model', 'foreign_key', 'owner_key');
    }
	
}