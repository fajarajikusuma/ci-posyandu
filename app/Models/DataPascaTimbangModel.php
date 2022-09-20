<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPascaTimbangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'datapascatimbangs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pasca', 'id_anak', 'id_penimbangan', 'nik', 'nama_anak', 'nama_ibu', 'nama_ayah', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'umur', 'bbl', 'pbl', 'berat_badan', 'tinggi_badan', 'tanggal_timbang', 'petugas'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
