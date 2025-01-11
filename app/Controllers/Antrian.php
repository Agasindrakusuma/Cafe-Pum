<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AntrianModel;
use App\Models\TransaksiModel;

class Antrian extends BaseController
{
    public $menuModel;
    public $antrianModel;
    public $transaksiModel;
    public $userModel;
    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->antrianModel = new AntrianModel();
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/dashboard");
        }
        return view('antrian');
    }

    public function dataAntrian()
    {
        echo json_encode($this->antrianModel->where("status !=", 2)->findAll());
    }

    public function dataAntrianSelesai()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d', strtotime('today')) . " 00:00:00";
        echo json_encode($this->antrianModel->where(["status" => 2, "tanggal >=" =>  $tanggal])->findAll());
    }

    public function proses()
    {
        $id = $this->request->getPost("idTransaksi");
        $status = $this->request->getPost("statusTransaksi");
        $data = ["status" => $status + 1];
        if ($status == 0) {
            $data["idUser"] = session()->get('id');
            date_default_timezone_set("Asia/Jakarta");
            $data["tanggal"] = date('Y-m-d h:m:s', strtotime('today'));
        }

        $this->antrianModel->update($id, $data);

        echo json_encode("");
    }

    public function rincianPesanan()
    {
        $idAntian = $this->request->getPost("idAntrian");

        $pesanan = $this->transaksiModel->where("idAntrian", $idAntian)->findAll();
        for ($i = 0; $i < count($pesanan); $i++) {
            $menu = $this->menuModel->where("id", $pesanan[$i]["idMenu"])->first();
            $pesanan[$i]["nama"] = $menu["nama"];
            $pesanan[$i]["harga"] = $menu["harga"];
        }
        echo json_encode($pesanan);
    }
    public function simpanAntrian()
    {
        // Ambil data dari POST
        $nama = $this->request->getPost('nama');
        $noMeja = $this->request->getPost('noMeja');
        $status = $this->request->getPost('status');
        $idUser = $this->request->getPost('idUser');

        // Siapkan data untuk disimpan
        $data = [
            'nama' => $nama,
            'noMeja' => $noMeja,
            'status' => $status, // Status 0 untuk 'Bayar', atau sesuaikan sesuai dengan kebutuhan
            'idUser' => $idUser,
            'tanggal' => date('Y-m-d H:i:s'), // Waktu saat transaksi disimpan
        ];

        // Simpan ke tabel antrian
        $this->antrianModel->save($data);

        // Kirim respons sukses
        return $this->response->setJSON(['status' => 'success']);
    }
}
