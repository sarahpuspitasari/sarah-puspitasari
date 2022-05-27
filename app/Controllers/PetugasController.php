<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $Datapetugas = new Petugas;
        $syarat = ['username' =>
        $this->request->getPost('txtUsername'), 'password' =>
        md5($this->request->getPost('txtPassword'))];
        $Userpetugas =
            $Datapetugas->where($syarat)->find();
        if (count($Userpetugas) == 1) {
            $session_data = ['username' =>
            $Userpetugas[0]['username'], 'id_petugas' =>
            $Userpetugas[0]['id_petugas'], 'level' =>
            $Userpetugas[0]['level'], 'sudahkahLogin' => TRUE];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        } else {
            return redirect()->to('/petugas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function tampilKamar()
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

        $data['ListKamar'] = $this->kamar
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.id_tipe_kamar')
            ->findAll();
        return view('kamar/tampil-kamar', $data);
    }

    public function tambahKamar()
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

        $data['tipe_kamar'] = $this->tipekamar->findAll();
        return view('kamar/tambah-kamar', $data);
    }
    public function simpanKamar()
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
        $Datakamar = new kamar;
        helper(['form']);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = [
            'nomor_kamar' => $this->request->getPost('txtNo'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'deskripsi' => $this->request->getPost('TxtInputDeskripsi'),
            'foto' => $upload->getName()
        ];
        $Datakamar->insert($datanya);
        return redirect()->to('/kamar/tampil')->with('berhasil', 'Data Berhasil di simpan');
    }

    public function editKamar($idkamar)
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
        $data['tipe_kamar'] = $this->tipekamar->findAll();
        $data['detailKamar'] = $this->kamar->where('id_kamar', $idkamar)->findAll();
        return view('kamar/edit-kamar', $data);
    }
    public function updateKamar()
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

        helper(['form']);
        $data = [
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'deskripsi' => $this->request->getPost('TxtInputDeskripsi')
        ];
        $this->kamar->update($this->request->getPost('txtNo'), $data);
        return redirect()->to('/kamar/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function editFoto($idKamar)
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
        $Datakamar = new kamar;
        $data['detailKamar'] = $Datakamar->where('id_kamar', $idKamar)->findAll();
        return view('kamar/update-foto', $data);
    }

    public function updateFoto()
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
        $syarat = $this->request->getPost('foto');
        unlink('gambar/' . $syarat);
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = ['foto' => $upload->getName()];
        $this->kamar->update($this->request->getPost('txtNo'), $datanya);
        return redirect()->to('/kamar/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function hapusKamar($idkamar)
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
        $syarat = (['id_kamar' => $idkamar]);
        $infoFile = $this->kamar->where($syarat)->findAll();

        //hapus file foto
        if (file_exists(APPPATH . '../public/gambar/' . $infoFile[0]['foto'])) {
            unlink(APPPATH . '../public/gambar/' . $infoFile[0]['foto']);
        }

        //hapus data di database
        $this->kamar->where('id_kamar', $idkamar)->delete();
        return redirect()->to('/kamar/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
