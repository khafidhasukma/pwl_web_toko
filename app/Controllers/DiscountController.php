<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DiskonModel;

class DiscountController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        // hanya untuk admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('failed', 'Akses ditolak');
        }

        $data['diskon'] = $this->diskon->orderBy('tanggal', 'DESC')->findAll();

        return view('v_discount', $data);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('failed', 'Gagal: tanggal sudah ada atau input tidak valid.');
        }

        $this->diskon->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $diskon = $this->diskon->find($id);

        if (!$diskon) {
            return redirect()->to('/diskon')->with('failed', 'Data tidak ditemukan');
        }

        $this->diskon->update($id, [
            'nominal' => $this->request->getPost('nominal'),
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);
        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}