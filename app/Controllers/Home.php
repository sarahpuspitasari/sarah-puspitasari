<?php

namespace App\Controllers;

use App\Models\Kamar;
use App\Models\FasilitasHotel;
use App\Models\Reservasi;

class Home extends BaseController
{
    public function index()
    {
        return view('hotel');
    }

    public function kamar()
    {
        $data['ListKamar'] = $this->kamar
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.id_tipe_kamar')
            ->findAll();

        return view('kamar', $data);
    }

    public function fasilitashotel()
    {
        $data['fasilitashotel'] = $this->hotel->findAll();
        return view('fasilitashotel', $data);
    }

    public function reservasi()
    {
        $data['tipe_kamar'] = $this->tipekamar->findAll();

        return view('reservasi', $data);
    }

    public function reservasiSimpan()
    {
        // delux = 100000
        // 2 kamar
        // 600000
        // in 24 - 0ut 26 = 2 malam

        $id_tipe_kamar = $this->request->getPost('tipe_kamar');
        $jumlah_kamar = $this->request->getPost('jumlah_kamar');

        $tipe_kamar = $this->tipekamar->find($id_tipe_kamar);
        $harga_tipe_kamar = $tipe_kamar['harga_tipe_kamar'];

        // harga = harga tipe kamar * jumlah kamar dipesan
        $harga_permalam = $harga_tipe_kamar * $jumlah_kamar;

        $checkin = strtotime($this->request->getPost('checkin'));
        $checkout = strtotime($this->request->getPost('checkout'));
        // Besar - Kecil = Out - In
        $lama_menginap = ($checkout - $checkin) / 86400;

        // total = harga permalam * lama menginap
        $total = $harga_permalam * $lama_menginap;

        $datanya = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_tlp' => $this->request->getPost('no_hp'),

            'id_tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'cek-in' => $this->request->getPost('checkin'),
            'cek-out' => $this->request->getPost('checkout'),
            'jumlah_kamar' => $this->request->getPost('jumlah_kamar'),

            'harga' => $harga_permalam,
            'total' => $total
        ];
        $this->reservasi->insert($datanya);
        return redirect()->to('/reservasi')->with('berhasil', 'Data Berhasil di Simpan');
    }
}
