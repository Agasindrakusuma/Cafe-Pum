<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AntrianModel;
use App\Models\TransaksiModel;

class Antrian extends BaseController
{
    public $data;
    public $harga;
    public $antrianModel;
    public $transaksiModel;
    public $menuModel;
    public $pembelianModel;

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
        $idAntrian = $this->request->getPost("idAntrian");
        log_message('debug', 'ID Antrian: ' . $idAntrian); // Log ID Antrian

        // Ambil data pesanan berdasarkan idAntrian
        $pesanan = $this->transaksiModel->where("idAntrian", $idAntrian)->findAll();
        log_message('debug', 'Data Pesanan: ' . print_r($pesanan, true)); // Log Data Pesanan

        if (empty($pesanan)) {
            echo json_encode([]);
            return;
        }

        // Ambil data menu untuk setiap pesanan
        for ($i = 0; $i < count($pesanan); $i++) {
            $menu = $this->menuModel->where("id", $pesanan[$i]["idMenu"])->first();
            if ($menu) {
                $pesanan[$i]["nama"] = $menu["nama"];
                $pesanan[$i]["harga"] = $menu["harga"];
            } else {
                $pesanan[$i]["nama"] = "Menu tidak ditemukan";
                $pesanan[$i]["harga"] = 0;
            }
        }

        log_message('debug', 'Data Pesanan dengan Menu: ' . print_r($pesanan, true)); // Log Data Pesanan dengan Menu
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
