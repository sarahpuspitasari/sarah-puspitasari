<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;

class FasilitasHotelController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        helper(['form']);
        $aturan = [
            'txtUsername' => 'required',
            'txtPassword' => 'required'
        ];
        if ($this->validate($aturan)) {
            $Datapetugas = new Petugas;
            $syarat = [
                'username' => $this->request->getPost('txtUsername'),
                'password' => md5($this->request->getPost('txtPassword'))
            ];
            $Userpetugas = $Datapetugas->where($syarat)->find();
            if (count($Userpetugas) == 1) {
                $session_data = [
                    'username' => $Userpetugas[0]['username'],
                    'level' => $Userpetugas[0]['level'],
                    'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                return redirect()->to('/petugas/dashboard');
            } else {
                return redirect()->to('/petugas');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function tampilHotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $data['ListHotel'] = $this->hotel->findAll();
        return view('fasilitas hotel/tampil-hotel', $data);
    }

    public function tambahHotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ? 
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        return view('fasilitas hotel/tambah-hotel');
    }

    public function simpanHotel()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        helper(['form']);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = [
            'nama_fasilitas' => $this->request->getPost('txtInputFasilitasHotel'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
            'foto' => $upload->getName()
        ];
        $this->hotel->insert($datanya);

        return redirect()->to('/hotel/tampil')->with('berhasil', 'Data Berhasil di Tambah');
    }

    public function editHotel($idhotel)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data['detailHotel'] = $this->hotel->where('id_fasilitas', $idhotel)->findAll();
        return view('fasilitas hotel/edit-hotel', $data);
    }

    public function updateHotel()
    {
        helper(['form']);
        $data = [
            'nama_fasilitas' => $this->request->getPost('txtInputFasilitasHotel'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
        ];
        $this->hotel->update($this->request->getPost('idfas'), $data);

        return redirect()->to('/hotel/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function editFotoHotel($idhotel)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) return redirect()->to('/petugas');
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') return redirect()->to('/petugas/dashboard');

        $data['detailHotel'] = $this->hotel->find($idhotel);
        return view('fasilitas hotel/edit-foto-hotel', $data);
    }

    public function updateFotoHotel()
    {
        $idfas = $this->request->getPost('idfas');

        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');

        $this->hotel->update($idfas, ['foto' => $upload->getName()]);

        return redirect()->to('/hotel/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function hapusHotel($idhotel)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $syarat = (['id_fasilitas' => $idhotel]);
        $infoFile = $this->hotel->where($syarat)->findAll();
        //hapus file foto
        unlink('gambar/' . $infoFile[0]['foto']);
        //hapus data di database
        $this->hotel->where('id_fasilitas', $idhotel)->delete();
        return redirect()->to('/hotel/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
