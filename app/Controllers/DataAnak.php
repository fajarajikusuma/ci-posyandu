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
        $lihatObject = json_decode(json_encode($lihat), FALSE);
        $data = [
            'title' => 'Data Anak',
            'id_anak' => $newID,
            'lihat' => $lihatObject
        ];
        return view('dataanak/input', $data);
    }

    //create function to save data
    public function save()
    {
        $anakModel = new \App\Models\DataAnakModel();
        $id_anak = $this->request->getPost('id_anak');
        $nik = $this->request->getPost('nik');
        $nama_anak = $this->request->getPost('nama_anak');
        $nama_ibu = $this->request->getPost('nama_ibu');
        $nama_ayah = $this->request->getPost('nama_ayah');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $bbl = $this->request->getPost('bbl');
        $pbl = $this->request->getPost('pbl');
        $alamat = $this->request->getPost('alamat');
        $cek = $anakModel->where('nik', $nik)->first();
        // dd($cek, $nik);
        if ($nik == "") {
            $data = [
                'id_anak' => $id_anak,
                'nik' => $nik,
                'nama_anak' => $nama_anak,
                'nama_ibu' => $nama_ibu,
                'nama_ayah' => $nama_ayah,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'bbl' => $bbl,
                'pbl' => $pbl,
                'alamat' => $alamat
            ];
            $anakModel->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/dataanak');
        } else if ($cek == null) {
            $data = [
                'id_anak' => $id_anak,
                'nik' => $nik,
                'nama_anak' => $nama_anak,
                'nama_ibu' => $nama_ibu,
                'nama_ayah' => $nama_ayah,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'bbl' => $bbl,
                'pbl' => $pbl,
                'alamat' => $alamat
            ];
            $anakModel->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            return redirect()->to('/dataanak');
        } else {
            session()->setFlashdata('error', 'NIK Sudah Terdaftar');
            return redirect()->to('/dataanak');
        }
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
            'nik' => $row->nik,
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
        $nik = $this->request->getPost('nik');
        $nama_anak = $this->request->getPost('nama_anak');
        $nama_ibu = $this->request->getPost('nama_ibu');
        $nama_ayah = $this->request->getPost('nama_ayah');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $bbl = $this->request->getPost('bbl');
        $pbl = $this->request->getPost('pbl');
        $alamat = $this->request->getPost('alamat');
        //cek nik agar tidak sama
        $cek = $db->query("SELECT * FROM data_anak WHERE nik = '$nik' AND id_anak != '$id_anak'");
        $row = $cek->getRow();
        if ($nik == "") {
            $data = [
                'id_anak' => $id_anak,
                'nik' => $nik,
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
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to('/dataanak');
        } else if ($row == null) {
            $data = [
                'id_anak' => $id_anak,
                'nik' => $nik,
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
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to('/dataanak');
        } else {
            session()->setFlashdata('error', 'NIK Sudah Terdaftar');
            return redirect()->to('/dataanak');
        }
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
