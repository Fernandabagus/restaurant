<?php

namespace App\Http\Controllers;

//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get 
        $orders = Order::latest()->paginate(5);

        //render view with 
        return view('orders.index', compact('orders'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('orders.create');
    }

     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_customer' => 'required',
            'tanggal_order' => 'required|date',
            'jumlah_total' => 'required|numeric',
        ]);

        //create post
        Order::create([
            'nama_customer' => $request->nama_customer,
            'tanggal_order' => $request->tanggal_order,
            'jumlah_total' => $request->jumlah_total,
        ]);

        //redirect to index
        return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get by ID
        $order = Order::findOrFail($id);

        //render view with 
        return view('orders.show', compact('order'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $order = Order::findOrFail($id);

        //render view with post
        return view('orders.edit', compact('order'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = validator($request->all(), [
            'nama_customer' => 'required',
            'tanggal_order' => 'required|date',
            'jumlah_total' => 'required|numeric',
            ])->validate();
            $order = Order::findOrFail($id); 
            $order->update([
            'nama_customer' => $request->nama_customer,
            'tanggal_order' => $request->tanggal_order,
            'jumlah_total'     => $request->jumlah_total
            ]);
            //redirect to index
            return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

/**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get by ID
        $order = Order::findOrFail($id);

        //delete
        $order->delete();

        //redirect to index
        return redirect()->route('orders.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
