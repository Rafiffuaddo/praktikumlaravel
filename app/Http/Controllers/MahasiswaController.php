<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class MahasiswaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_mahasiswa = \App\Models\Mahasiswa::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        }
        else {
            $data_mahasiswa = \App\Models\Mahasiswa::all();
        }
        return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]);
    }
    public function create(Request $request)
    {
        \App\Models\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil di input');
    }

    public function edit($id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        return view('mahasiswa.edit', ['mahasiswa' => $data_mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->update($request->all());
        return redirect('mahasiswa')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
        $data_mahasiswa = \App\Models\Mahasiswa::find($id);
        $data_mahasiswa->delete();
        return redirect('mahasiswa')->with('sukses', 'Data berhasil di hapus');
    }

    public function exportpdf()
    {
        $data_mahasiswa = \App\Models\Mahasiswa::all();
        $pdf = PDF::loadView('export.mahasiswapdf', ['mahasiswa' => $data_mahasiswa]);
        return $pdf->download('mahasiswa.pdf');
    }
}