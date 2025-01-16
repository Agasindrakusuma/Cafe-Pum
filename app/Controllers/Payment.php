<?php

namespace App\Controllers;

use Midtrans;
use App\Models\AntrianModel;
use App\Models\TransaksiModel;
use App\Models\MenuModel;

class Payment extends BaseController
{
    public $antrianModel;
    public $transaksiModel;
    public $menuModel;

    public function __construct()
    {
        $this->antrianModel = new AntrianModel();
        $this->transaksiModel = new TransaksiModel();
        $this->menuModel = new MenuModel();
    }

    public function getSnapToken()
    {
        try {
            $data = $this->request->getJSON();
            $nama = $data->nama;
            $noMeja = $data->noMeja;
            $pesanan = $data->pesanan;

            if (empty($pesanan) || !is_array($pesanan)) {
                return $this->response->setStatusCode(400)->setJSON(['error' => 'Pesanan tidak valid']);
            }

            $totalHarga = 0;
            $items = [];
            foreach ($pesanan as $item) {
                $jumlah = $item->quantity;
                $harga = $item->price;
                $totalHarga += $jumlah * $harga;
                $items[] = [
                    'id' => $item->id,
                    'price' => $harga,
                    'quantity' => $jumlah,
                    'name' => $item->name,
                ];
            }

            $this->setMidtransConfig();

            $params = [
                'transaction_details' => [
                    'order_id' => uniqid('order-'),
                    'gross_amount' => $totalHarga
                ],
                'customer_details' => [
                    'first_name' => $nama,
                    'table_number' => $noMeja
                ],
                'item_details' => $items
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return $this->response->setJSON(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            log_message('error', 'Error mendapatkan Snap Token: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal memproses transaksi']);
        }
    }

    public function handleTransactionCallback()
{
    try {
        $json = $this->request->getJSON();

        if ($json && isset($json->transaction_status) && isset($json->order_id)) {
            $order_id = $json->order_id;
            $status = $json->transaction_status;

            if ($status == 'settlement') {
                // Simpan data antrian
                $antrianData = [
                    'nama' => $json->customer_details->first_name,
                    'noMeja' => $json->customer_details->table_number,
                    'tanggal' => date('Y-m-d H:i:s'),
                    'status' => 0, // Status awal: menunggu diproses
                    'idUser' => session()->get('id') ?? null, // Jika ada user yang login, sesuaikan
                    'order_id' => $order_id, // Simpan order_id dari Midtrans
                ];

                // Simpan ke tabel antrian
                $this->antrianModel->save($antrianData);
                $idAntrian = $this->antrianModel->insertID(); // Ambil ID antrian yang baru disimpan

                // Simpan detail transaksi (pesanan)
                if (isset($json->item_details) && is_array($json->item_details)) {
                    foreach ($json->item_details as $item) {
                        $transaksiData = [
                            'idMenu' => $item->id,
                            'jumlah' => $item->quantity,
                            'idAntrian' => $idAntrian,
                        ];
                        $this->transaksiModel->insert($transaksiData);
                    }
                } else {
                    log_message('error', 'Item details tidak valid atau kosong.');
                }

                return $this->response->setStatusCode(200)->setJSON(['message' => 'Pesanan berhasil diproses ke antrian']);
            } else {
                return $this->response->setStatusCode(200)->setJSON(['message' => 'Pembayaran belum selesai atau tidak berhasil']);
            }
        }

        return $this->response->setStatusCode(400)->setJSON(['error' => 'Data callback tidak valid']);
    } catch (\Exception $e) {
        log_message('error', 'Error callback: ' . $e->getMessage());
        return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal memproses callback']);
    }
}

    private function setMidtransConfig()
    {
        \Midtrans\Config::$serverKey = 'Mid-server-LJFO4izkkcCd5iUx_KFy2iTp';
        \Midtrans\Config::$isProduction = true;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }
}
