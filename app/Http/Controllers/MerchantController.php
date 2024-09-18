<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Merchant;

class MerchantController extends Controller
{
    public function profilpage()
    {
        return view('profil_merchant');
    }

    public function updateProfil(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $user = auth()->user();

        // Cari merchant berdasarkan user_id, bukan hanya memeriksa keberadaannya
        $merchant = Merchant::where('user_id', $user->id)->first();

        if ($merchant) {
            // Jika sudah ada, update
            $merchant->update($validatedData);
        } else {
            // Jika belum ada, buat baru
            $validatedData['user_id'] = $user->id; // Tambahkan user_id ke data yang divalidasi
            Merchant::create($validatedData);
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
