<?php

namespace App\Http\Controllers;

use App\Models\AgendaMasukDetail;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;


use Illuminate\Http\Request;

class AgendaMasukDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $agendadtls = AgendaMasukDetail::oldest()->paginate();

        return view('kantor.agenda masuk.agenda_masuk_detail', compact('agendadtls'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('kantor.agenda masuk.tambah_agenda_detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'id_agenda'     => 'required',
            'nama_barang'   => 'required',
            'satuan'        => 'required',
            'harga-atribusi'=> 'required',
        ]);

        //create post
        AgendaMasukDetail::create([
            'id_agenda'     => $request->id_agenda,
            'nama_barang'   => $request->nama_barang,
            'merk'          => $request->merk,
            'tipe'          => $request->tipe,
            'satuan'        => $request->satuan,
            'harga_satuan'  => $request->harga_satuan,
            'biaya_atribusi'=> $request->biaya_atribusi,
            'tgl_bahp'      => $request->tgl_bahp,
            'bast'          => $request->bast,
            'tgl_bast'      => $request->tgl_bast,
            'dokumen'       => $request->dokumen,
            'Keterangan'    => $request->Keterangan
        ]);

        //redirect to index
        return redirect()->route('agendadtls.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}