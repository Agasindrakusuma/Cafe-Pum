<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AntrianModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Dashboard extends BaseController
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
        $this->userModel = new UserModel();
    }
    public function dashboard()
    {
        // Logic to display the dashboard
        $data = [
            // Any data you want to pass to the view
        ];

        return view('dashboard', $data);
    }
    public function index()
    {
        $user = $this->userModel->where('hapus', NULL)->findAll();
        $data = [
            "user" => $user,
        ];
        return view('dashboard_info', $data);
    }

    public function goToMenu()
    {
        
        $user = $this->userModel->where('hapus', NULL)->findAll();
        unset($user["password"]);
        $data = [
            "user" => $user,
            "kopi" => $this->menuModel->where(["jenis" => 1, "hapus" => NULL])->findAll(),
            "nonKopi" => $this->menuModel->where(["jenis" => 2, "hapus" => NULL])->findAll(),
            "snack" => $this->menuModel->where(["jenis" => 3, "hapus" => NULL])->findAll(),
            "minumanPanas" => $this->menuModel->where(["jenis" => 4, "hapus" => NULL])->findAll(),
        ];
        return view('dashboard', $data);
    }
    public function antrian()
    {
        // ... other code ...

        $kopi = $this->menuModel->where(['jenis' => 1, 'hapus' => NULL])->findAll();

        $data = [
            
            'kopi' => $kopi
        ];

        return view('antrian', $data);
    }

    public function tambahPesanan()
    {
        $nama = $this->request->getPost("nama");
        $noMeja = $this->request->getPost("noMeja");
        $pesanan = $this->request->getPost("pesanan");

        $antrian = [
            "nama" => $nama,
            "noMeja" => $noMeja,
            "idUser" => 1
        ];

        $idAntian = $this->antrianModel->insert($antrian);

        for ($i = 0; $i < count($pesanan); $i++) {
            $menu = [
                "idMenu" => $pesanan[$i][0],
                "jumlah" => $pesanan[$i][2],
                "idAntrian" => $idAntian
            ];
            $this->transaksiModel->save($menu);
        }
        echo json_encode("");
    }
    
    public function laporan()
    {
        // Logic untuk memproses laporan, misalnya mengambil data dari database
        $data = [
            // Contoh data yang bisa dikirim ke view laporan
        ];

        // Tampilkan halaman laporan
        return view('laporan', $data);
    }

    public function menu()
    {
        // Logic untuk memproses laporan, misalnya mengambil data dari database
        $data = [
            // Contoh data yang bisa dikirim ke view laporan
        ];

        // Tampilkan halaman laporan
        return view('menu', $data);
    }

    public function user()
    {
        // Logic untuk memproses laporan, misalnya mengambil data dari database
        $data = [
            // Contoh data yang bisa dikirim ke view laporan
        ];

        // Tampilkan halaman laporan
        return view('user', $data);
    }


    public function auth()
    {
        $usersModel = new UserModel();
        $id = $this->request->getPost('idUser');
        $password = $this->request->getPost('pass');
        $user = $usersModel->where('id', $id)->first();

        if (empty($user)) {
            echo json_encode('<span class="badge badge-danger">Username Salah :(</span>');
        } else if (password_verify($password, $user['password'])) {
            session()->set('nama', $user["nama"]);
            session()->set('rule', $user["rule"]);
            session()->set('id', $user["id"]);
            echo json_encode("");
        } else {
            echo json_encode('<span class="badge badge-danger">Password Salah :(</span>');
        }
    }

    public function logout()
    {
        session()->remove('nama');
        session()->remove('rule');
        return redirect()->to(base_url() . "/dashboard");
    }
}
