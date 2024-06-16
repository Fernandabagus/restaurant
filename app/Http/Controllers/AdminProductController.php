<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

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
        // FacadesAlert::success('Berhasil', 'Pengaduan berhasil ditambahkan');
        return redirect()->route('product-admin');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);      
        try {
            $product->delete();
            return redirect()->back()->with('success', 'Berhasil hapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorr', 'Gagal');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }
    // public function update(Request $request, $id)
    // {
    //     // dd($request);
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'harga' => 'required|min:3',
    //         'kategori' => 'nullable',
    //         'deskripsi' => 'required|string',
    //         'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
    //     ]);

    //     $product = Product::findOrFail($id);

    //     if ($request->hasFile('img')) {
    //         if ($request->img != null) {
    //             $realLocation = "storage/" . $request->img;
    //             if (file_exists($realLocation) && !is_dir($realLocation)) {
    //                 unlink($realLocation);
    //             }
    //         }
    //         $img = $request->file('img');
    //         $file_name = time() . '-' . $img->getClientOriginalName();

    //         $data['img'] = $request->file('img')->store('assets/product', 'public');
    //     } else {
    //         $data['img'] = $request->img;
    //     }

    //     $product->save();
    //     // FacadesAlert::success('Berhasil', 'Food updated successfully!');
    //     return redirect(route('product-admin'));
    // }


    public function update(Request $request, string $id)
    {
        $item = Product::find($id);
        $data = $request->validate([
            'nama'      => 'nullable',
            'deskripsi' => 'nullable',
            'harga'     => 'nullable',
            'kategori'  => 'nullable',
            'img'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('img')) {

            if ($item->img != null) {
                $realLocation = "storage/" . $item->img;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $img = $request->file('img');
            $file_name = time() . '-' . $img->getClientOriginalName();

            $data['img'] = $request->file('img')->store('assets/product', 'public');
        } else {
            $data['img'] = $item->img;
        }

        $item->update($data);
        // FacadesAlert::success('Berhasil', 'Pengajuan Surat Pengantar Pembuatan KTP Berhasil Diubah');
        return redirect()->route('product-admin');
    }
}
