<?php

namespace App\Http\Controllers;

use App\Models\KuponDiskon;
use Illuminate\Http\Request;

class KuponDiskonController extends Controller
{
    public function index()
    {
        $kuponDiskons = KuponDiskon::all();
        return view('kupondiskons.index', compact('kuponDiskons'));
    }

    public function create()
    {
        return view('kupondiskons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:kupon_diskons,code',
            'discount_percentage' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        KuponDiskon::create($request->all());
        return redirect()->route('kupondiskons.index');
    }

    public function show(KuponDiskon $kuponDiskon)
    {
        return view('kupondiskons.show', compact('kuponDiskon'));
    }

    public function edit(KuponDiskon $kuponDiskon)
    {
        return view('kupondiskons.edit', compact('kuponDiskon'));
    }

    public function update(Request $request, KuponDiskon $kuponDiskon)
    {
        $request->validate([
            'code' => 'required|unique:kupon_diskons,code,' . $kuponDiskon->id,
            'discount_percentage' => 'required|numeric',
            'expiry_date' => 'required|date',
        ]);

        $kuponDiskon->update($request->all());
        return redirect()->route('kupondiskons.index');
    }

    public function destroy(KuponDiskon $kuponDiskon)
    {
        $kuponDiskon->delete();
        return redirect()->route('kupondiskons.index');
    }
}
