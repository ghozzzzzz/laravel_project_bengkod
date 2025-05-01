<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PemeriksaanController extends Controller
{
    /**
     * Menampilkan form edit pemeriksaan untuk dokter.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $periksa = Periksa::with(['pasien', 'dokter', 'detail_periksa.obat'])
            ->where('id_dokter', Auth::id())
            ->findOrFail($id);
        $obats = Obat::all();

        return view('dokter.form_periksa', compact('periksa', 'obats'));
    }

    /**
     * Memperbarui data pemeriksaan dan obat yang dipilih.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Log input untuk debugging
        Log::info('Input diterima di update pemeriksaan:', $request->all());

        // Validasi input
        $request->validate([
            'catatan' => 'required|string|max:1000',
            'obat_id' => 'nullable|array',
            'obat_id.*' => 'exists:obats,id',
            'total_harga' => 'required|numeric|min:0',
        ], [
            'catatan.required' => 'Catatan wajib diisi.',
            'catatan.string' => 'Catatan harus berupa teks.',
            'catatan.max' => 'Catatan maksimal 1000 karakter.',
            'obat_id.array' => 'Obat tidak valid.',
            'obat_id.*.exists' => 'Obat yang dipilih tidak valid.',
            'total_harga.required' => 'Total harga wajib diisi.',
            'total_harga.numeric' => 'Total harga harus berupa angka.',
            'total_harga.min' => 'Total harga tidak boleh negatif.',
        ]);

        // Cari pemeriksaan
        $periksa = Periksa::where('id_dokter', Auth::id())->findOrFail($id);

        // Hapus detail periksa lama
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Tambahkan obat baru jika ada
        $obatIds = $request->input('obat_id', []);
        if (!empty($obatIds)) {
            foreach ($obatIds as $obatId) {
                Log::info('Menyimpan detail_periksa:', [
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obatId,
                ]);
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obatId,
                ]);
            }
        } else {
            Log::info('Tidak ada obat_id yang diterima di update pemeriksaan');
        }

        // Update data pemeriksaan
        $periksa->update([
            'catatan' => $request->catatan,
            'biaya_pemeriksaan' => $request->total_harga,
        ]);

        return redirect()->route('dokter.memeriksa')
            ->with('success', 'Pemeriksaan berhasil disimpan.');
    }
}