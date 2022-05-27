<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Fasilitas;

class FasilitasController extends BaseController
{
    public function tampilFasilitas()
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

        $data['ListFasilitas'] = $this->fasilitas
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = fasilitas_kamar.id_tipe_kamar')
            ->findAll();

        return view('fasilitas kamar/tampil-fasilitas', $data);
    }
    public function tambahFasilitas()
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
        return view('fasilitas kamar/tambah-fasilitas', $data);
    }

    public function simpanFasilitas()
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
        $datanya = [
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas'),
        ];
        $this->fasilitas->insert($datanya);
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di simpan');
    }

    public function editFasilitas($idfasilitas)
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
        $data['detailFasilitas'] = $this->fasilitas->find($idfasilitas);
        return view('fasilitas kamar/edit-fasilitas', $data);
    }

    public function updateFasilitas()
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
        $data = [
            'id_fasilitas_kamar' => $this->request->getPost('idfas'),
            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'nama_fasilitas' => $this->request->getPost('txtInputNamaFasilitas')
        ];
        $this->fasilitas->update($this->request->getPost('idfas'), $data);
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function hapusFasilitas($idfasilitas)
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
        $syarat = (['id_fasilitas_kamar' => $idfasilitas]);
        $infoFile = $this->fasilitas->where($syarat)->findAll();
        //hapus data di database
        $this->fasilitas->where('id_fasilitas_kamar', $idfasilitas)->delete();
        return redirect()->to('/fasilitas/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
