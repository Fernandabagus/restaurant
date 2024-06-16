<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            if ($request->img != null) {
                $realLocation = "storage/" . $request->img;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $img = $request->file('img');
            $file_name = time() . '-' . $img->getClientOriginalName();

            $data['img'] = $request->file('img')->store('assets/product', 'public');
        } else {
            $data['img'] = $request->img;
        }

        Product::create($data);
        FacadesAlert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('product-admin');
    }

    public function destroy($id)
    {
        $product = Product::find($id);  
        // dd($product);      
        try {
            $product->delete();
            
            FacadesAlert::success('Berhasil', 'Data berhasil dihapus');
            return redirect()->back()->with('success', 'Berhasil hapus');
        } catch (\Throwable $th) {
            FacadesAlert::error('Gagal', 'Data gagal sihapus');
            return redirect()->back()->with('errorr', 'Gagal');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|min:3',            
            'kategori' => 'required',            
            'deskripsi' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($request->img != null) {

                $image = $request->file('img');
                $imagePath = $product->img;
                $realLocation = $imagePath;

                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }
            $image = $request->file('img');
            $folderPath = 'assets/product/';
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img'] = 'storage/' . $imagePath;
        }



        $product->nama = $validatedData['nama'];
        $product->harga = $validatedData['harga'];
        $product->kategori = $validatedData['kategori'];
        $product->deskripsi = $validatedData['deskripsi'];
        $product->img = $validatedData['img'] ?? $product->img;

        $product->save();
        FacadesAlert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect(route('product-admin'));
    }
}
