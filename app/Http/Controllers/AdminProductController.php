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
}
