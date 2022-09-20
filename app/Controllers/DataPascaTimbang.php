<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DataPascaTimbang extends BaseController
{
    public function index()
    {
        // show join data penimbangan and data anak
        session();
        $db = \Config\Database::connect();
        $dataAnakModel = new \App\Models\DataAnakModel();
        $dataAnak = $dataAnakModel->findAll();
        //get array umur from data_anak
        $umur = array();
        foreach ($dataAnak as $row) {
            $tanggal_lahir = $row['tanggal_lahir'];
            $tanggal_lahir = new \DateTime($tanggal_lahir);
            $today = new \DateTime('today');
            $umurTahun = $today->diff($tanggal_lahir)->y;
            $umurBulan = $today->diff($tanggal_lahir)->m;
            $umurAsBulan = $umurTahun * 12;
            $umurBulan = $umurAsBulan + $umurBulan;
            array_push($umur, $umurBulan);
        }
        //get array id_anak from data_anak
        $id_anak = array();
        foreach ($dataAnak as $row) {
            array_push($id_anak, $row['id_anak']);
        }
        //create validation to show umur >= 60 bulan where id_anak = id_anak
        if (count($umur) == count($id_anak)) {
            $dataUmur = array_combine($id_anak, $umur);
        }
        foreach ($dataUmur as $key => $value) {
            if ($value >= 60) {
                $dataUmur[$key] = $value;
            } else {
                unset($dataUmur[$key]);
            }
        }
        //show $dataUmur where umur >= 60 bulan
        $dataUmur = array_keys($dataUmur);
        $dataUmur = implode("','", $dataUmur);
        $query = $db->query("SELECT * FROM data_penimbangan JOIN data_anak ON data_penimbangan.id_anak = data_anak.id_anak WHERE data_penimbangan.id_anak IN ('$dataUmur')");
        $showDataTimbang = $query->getResult();
        $data = [
            'title' => 'Data Pasca Timbang',
            'showDataPascaTimbang' => $showDataTimbang
        ];
        return view('datapascatimbang/tableDataPasca', $data);
    }

    //create funtion to move data penimbangan and data anak if $umur == 60
    public function input($id_anak)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id_pasca) AS id_max FROM data_pasca_timbang");
        foreach ($query->getResult() as $row) {
            $id = $row->id_max;
        }
        $noUrut = (int) substr($id, 3, 3);
        $noUrut++;
        $char = "PT";
        $newID = $char . sprintf("%04s", $noUrut);
        $data = [
            'title' => 'Input Data Pasca Timbang',
            'id_pasca' => $newID,
            'id_anak' => $id_anak
        ];
        return view('datapascatimbang/tableDataPasca', $data);
    }
}
