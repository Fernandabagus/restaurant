<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class BooktableController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'BOOK A TABLE',
            'content'   => 'users/booktable/index',
            'products'  => Booktable::all(),
        ];
        return view('users.layouts.wrapper', $data);

        // {
        //     $booking = Booktable::orderBy('created_at','asc')->get(); 
        //     return view('booktable.index', ['booking' => $booking]);
        // }
    
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'many_person'   => 'required',
            'book_date'     => 'required'
        ]);

        Booktable::create([
            'many_person'   => $request->input('many_person'),
            'book_date'     => $request->input('book_date'),
            'user_id'       => $request->input('user_id')
        ]);

        return redirect()->route('book-table');

    }

    public function edit($id)
    {
        $booking = Booktable::findOrFail($id);
        return view('booktable.edit', ['booking' => $booking]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|varchar|min:12',            
            'email' => 'required|string',
        ]);

        $booking = Booktable::findOrFail($id);

        $booking->name = $validatedData['name'];
        $booking->phone = $validatedData['phone'];
        $booking->email = $validatedData['email'];
        
        $booking->save();
        FacadesAlert::success('Berhasil', 'book a table updated successfully!');
        return redirect(route('booking-list'));
    }

    public function destroy($id)
    {
        $booking = Booktable::findOrFail($id);
        
        $booking->delete();
        FacadesAlert::success('Berhasil', 'book a table deleted successfully!');
        return redirect(route('booking-list'));
    }

    public function trash()
    {
        $booking = Booktable::onlyTrashed()->get();
        return view('booking.trash', compact('booking'));
    }

    public function restore($id)
    {
        $booking = Booktable::onlyTrashed()->findOrFail($id);
        $booking->restore();
       
        return redirect()->route('booking.trash');
    }

    public function forceDelete($id)
    {
        $booking =  Booktable::onlyTrashed()->where('id', $id)->firstOrFail();
        $booking->forceDelete();
        
        return redirect()->route('booking.trash');
    }

    public function restoreAll()
    {
        Booktable::onlyTrashed()->restore();
      
        return redirect()->route('booking.trash');
    }

    public function forceDeleteAll()
    {
        Booktable::onlyTrashed()->forceDelete();
        
        return redirect()->route('booking.trash');
    }
}

