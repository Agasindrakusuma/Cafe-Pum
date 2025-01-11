<?php

namespace App\Controllers;

use Midtrans\Config;
use Midtrans\Snap;

class Payment extends BaseController
{
    public function index()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = 'Mid-server-LJFO4izkkcCd5iUx_KFy2iTp'; // Ganti dengan Server Key Anda
        Config::$isProduction = false; // Sesuaikan dengan environment Anda
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Dummy data untuk total harga, sesuaikan dengan data nyata dari database atau session
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => 10000,
            ]
        ];

        $data = [
            'snaptoken' => Snap::getSnapToken($params)
        ];

        return view('payment/pay', $data);
    }

    public function getSnapToken()
    {
        try {
            $data = $this->request->getJSON();
            $nama = $data->nama;
            $noMeja = $data->noMeja;
            $pesanan = $data->pesanan; // Pesanan harus berupa array dari menu yang dipilih

            // Perhitungan total harga berdasarkan pesanan
            $totalHarga = 0;
            foreach ($pesanan as $item) {
                $totalHarga += $item->harga * $item->jumlah;
            }

            // Log untuk memeriksa data yang diterima
            log_message('info', 'Nama: ' . $nama);
            log_message('info', 'No Meja: ' . $noMeja);
            log_message('info', 'Pesanan: ' . json_encode($pesanan));
            log_message('info', 'Total Harga: ' . $totalHarga);

            // Konfigurasi Midtrans
            Config::$serverKey = 'Mid-server-LJFO4izkkcCd5iUx_KFy2iTp'; // Ganti dengan Server Key Anda
            Config::$isProduction = false; // Set ke true untuk production
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // Parameter transaksi Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => rand(),
                    'gross_amount' => $totalHarga,
                ],
                'customer_details' => [
                    'first_name' => $nama,
                    'table_number' => $noMeja,
                ]
            ];

            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            return $this->response->setJSON(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            // Log error untuk debug
            log_message('error', 'Error mendapatkan Snap Token: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Gagal memproses transaksi']);
        }
    }
}
