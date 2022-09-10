<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\MySQLi\Result;

class DataAnak extends BaseController
{
    public function index()
    {
        //
        session();
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id_anak) AS id_max FROM data_anak");
        foreach ($query->getResult() as $row) {
            $id = $row->id_max;
        }
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $char = "AN";
        $newID = $char . sprintf("%04s", $noUrut);
        $DataAnak = new \App\Models\DataAnakModel();
        $lihat = $DataAnak->findAll();
        $data = [
            'title' => 'Data Anak',
            'id_anak' => $newID,
            'lihat' => $lihat
        ];
        return view('dataanak/input', $data);
    }

    //create function to save data
    public function save()
    {
        $db = \Config\Database::connect();
        $id_anak = $this->request->getPost('id_anak');
        $nama_anak = $this->request->getPost('nama_anak');
        $nama_ibu = $this->request->getPost('nama_ibu');
        $nama_ayah = $this->request->getPost('nama_ayah');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $bbl = $this->request->getPost('bbl');
        $pbl = $this->request->getPost('pbl');
        $alamat = $this->request->getPost('alamat');
        $data = [
            'id_anak' => $id_anak,
            'nama_anak' => $nama_anak,
            'nama_ibu' => $nama_ibu,
            'nama_ayah' => $nama_ayah,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'bbl' => $bbl,
            'pbl' => $pbl,
            'alamat' => $alamat
        ];
        $db->table('data_anak')->insert($data);
        return redirect()->to('/dataanak');
    }

    //create function to edit data
    public function edit($id_anak)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM data_anak WHERE id_anak = '$id_anak'");
        $row = $query->getRow();
        $data = [
            'title' => 'Edit Data Anak',
            'id_anak' => $row->id_anak,
            'nama_anak' => $row->nama_anak,
            'nama_ibu' => $row->nama_ibu,
            'nama_ayah' => $row->nama_ayah,
            'tanggal_lahir' => $row->tanggal_lahir,
            'jenis_kelamin' => $row->jenis_kelamin,
            'bbl' => $row->bbl,
            'pbl' => $row->pbl,
            'alamat' => $row->alamat
        ];
        return view('dataanak/edit', $data);
    }

    //create function to update data
    public function update()
    {
        $db = \Config\Database::connect();
        $id_anak = $this->request->getPost('id_anak');
        $nama_anak = $this->request->getPost('nama_anak');
        $nama_ibu = $this->request->getPost('nama_ibu');
        $nama_ayah = $this->request->getPost('nama_ayah');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $bbl = $this->request->getPost('bbl');
        $pbl = $this->request->getPost('pbl');
        $alamat = $this->request->getPost('alamat');
        $data = [
            'id_anak' => $id_anak,
            'nama_anak' => $nama_anak,
            'nama_ibu' => $nama_ibu,
            'nama_ayah' => $nama_ayah,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'bbl' => $bbl,
            'pbl' => $pbl,
            'alamat' => $alamat
        ];
        $db->table('data_anak')->where('id_anak', $id_anak)->update($data);
        return redirect()->to('/dataanak');
    }
    //create function to delete data with alert
    public function delete($id_anak)
    {
        $modelDataAnak = new \App\Models\DataAnakModel();
        $modelDataAnak->delete($id_anak);
        session()->setFlashdata('pesan', 'Data $id_anak berhasil dihapus');
        return redirect()->to('/dataanak');
    }
}
