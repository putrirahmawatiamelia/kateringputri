<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = auth()->user()->merchant->menus; // Mengambil menu berdasarkan merchant yang sedang login

        return view('merchant/menu', compact('menus'));
    }

    public function create()
    {
        return view('merchant/tambahmenu'); // Atau nama view yang sesuai
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk, kecuali merchant_id karena akan diambil dari user login
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
        ]);

        // Pastikan user memiliki role merchant
        if (auth()->user()->role !== 'merchant') {
            return redirect()->back()->withErrors(['error' => 'Hanya merchant yang dapat menambahkan menu.']);
        }

        // Ambil merchant_id dari user yang sedang login
        $merchantId = auth()->user()->merchant->id;

        // Simpan image jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public');
        } else {
            $imagePath = null;
        }

        // Simpan data menu
        Menu::create([
            'merchant_id' => $merchantId,
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'harga' => $request->harga,
        ]);

        return redirect()->route('merchant/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $product = Menu::findOrFail($id);

        return view('merchant/updatemenu', compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Menu::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('merchant/menu')->with('success', 'product updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Menu::findOrFail($id);

        $product->delete();

        return redirect()->route('merchant/menu')->with('success', 'product deleted successfully');
    }

}
