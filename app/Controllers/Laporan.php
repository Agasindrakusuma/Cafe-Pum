<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\AntrianModel;
use App\Models\MenuModel;
use App\Models\PembelianModel;

class Laporan extends BaseController
{
    public $menuModel;
    public $antrianModel;
    public $transaksiModel;
    public $pembelianModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->antrianModel = new AntrianModel();
        $this->menuModel = new MenuModel();
        $this->pembelianModel = new PembelianModel();
    }

    public function index()
    {
        if (!session()->get('nama')) {
            return redirect()->to(base_url() . "/dashboard");
        }
        return view('laporan');
    }

    public function laporanSemua()
    {
        $tanggalMulai = $this->request->getPost("tanggalMulai") . " 00:00:00";
        $tanggalSelesai = $this->request->getPost("tanggalSelesai") . " 23:59:59";

        // Perbaikan query untuk memastikan status selesai sesuai
        $pembelian = $this->pembelianModel
            ->where("tanggal >=", $tanggalMulai)
            ->where("tanggal <=", $tanggalSelesai)
            ->where("statusAntrian", 1) // Status selesai
            ->findAll();

        echo json_encode($pembelian);
    }

    public function laporanMenu()
    {
        $tanggalMulai = $this->request->getPost("tanggalMulai") . " 00:00:00";
        $tanggalSelesai = $this->request->getPost("tanggalSelesai") . " 23:59:59";

        $pembelian = $this->pembelianModel
            ->where("tanggal >=", $tanggalMulai)
            ->where("tanggal <=", $tanggalSelesai)
            ->where("statusAntrian", 1) // Status selesai
            ->findAll();

        $dataLaporan = [];
        foreach ($pembelian as $item) {
            $index = array_search($item['idMenu'], array_column($dataLaporan, 'id'));
            if ($index !== false) {
                $dataLaporan[$index]['jumlah'] += $item['jumlah'];
            } else {
                $dataLaporan[] = [
                    "id" => $item["idMenu"],
                    "nama" => $item["namaMenu"],
                    "jumlah" => $item["jumlah"],
                    "harga" => $item["harga"]
                ];
            }
        }

        echo json_encode($dataLaporan);
    }

    public function laporanAntrian()
    {
        $tanggalMulai = $this->request->getPost("tanggalMulai") . " 00:00:00";
        $tanggalSelesai = $this->request->getPost("tanggalSelesai") . " 23:59:59";

        $pembelian = $this->pembelianModel
            ->where("tanggal >=", $tanggalMulai)
            ->where("tanggal <=", $tanggalSelesai)
            ->where("statusAntrian", 1) // Status selesai
            ->findAll();

        $dataLaporan = [];
        foreach ($pembelian as $item) {
            $index = array_search($item['idAntrian'], array_column($dataLaporan, 'id'));
            if ($index !== false) {
                $dataLaporan[$index]['jumlahPesan'] += 1;
                $dataLaporan[$index]['pembayaran'] += $item['jumlah'] * $item['harga'];
            } else {
                $dataLaporan[] = [
                    "id" => $item["idAntrian"],
                    "nama" => $item["namaAntrian"],
                    "noMeja" => $item["noMeja"],
                    "jumlahPesan" => 1,
                    "pembayaran" => $item["jumlah"] * $item["harga"]
                ];
            }
        }

        echo json_encode($dataLaporan);
    }
}
