<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DataPenimbangan extends BaseController
{
    public function index()
    {
        // show join data penimbangan and data anak
        session();
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM data_penimbangan JOIN data_anak ON data_penimbangan.id_anak = data_anak.id_anak");
        $showDataTimbang = $query->getResult();
        $dataAnakModel = new \App\Models\DataAnakModel();
        $dataAnak = $dataAnakModel->findAll();
        $data = [
            'title' => 'Data Penimbangan',
            'lihat' => $dataAnak,
            'showDataTimbang' => $showDataTimbang
        ];
        return view('datapenimbangan/tableInput', $data);
    }

    public function inputData($id_anak)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id_penimbangan) AS id_max FROM data_penimbangan");
        foreach ($query->getResult() as $row) {
            $id = $row->id_max;
        }
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $char = "PN";
        $newID = $char . sprintf("%04s", $noUrut);
        $data = [
            'title' => 'Data Penimbangan',
            'id_penimbangan' => $newID,
            'id_anak' => $id_anak
        ];
        return view('datapenimbangan/inputData', $data);
    }
    //create function to save data
    public function save()
    {
        $db = \Config\Database::connect();
        $id_penimbangan = $this->request->getPost('id_penimbangan');
        $id_anak = $this->request->getPost('id_anak');
        $tanggal_input = $this->request->getPost('tanggal_input');
        $berat_badan = $this->request->getPost('berat_badan');
        $tinggi_badan = $this->request->getPost('tinggi_badan');
        $bbl = $this->request->getPost('bbl');
        $umur = $this->request->getPost('umur');
        $keterangan = $this->request->getPost('keterangan');
        $pbl = $this->request->getPost('pbl');
        $petugas = $this->request->getPost('petugas');
        $data = [
            'id_penimbangan' => $id_penimbangan,
            'id_anak' => $id_anak,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'bbl' => $bbl,
            'pbl' => $pbl,
            'umur' => $umur,
            'keterangan' => $keterangan,
            'petugas' => $petugas,
            'tanggal_input' => $tanggal_input
        ];
        $db->table('data_penimbangan')->insert($data);
        return redirect()->to('/datapenimbangan');
    }

    //create function to delete data
    public function delete($id_penimbangan)
    {
        $db = \Config\Database::connect();
        $db->table('data_penimbangan')->delete(['id_penimbangan' => $id_penimbangan]);
        return redirect()->to('/datapenimbangan');
    }
}
