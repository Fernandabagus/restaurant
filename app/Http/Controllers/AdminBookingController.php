<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminBookingController extends Controller
{
     public function index()
    {
        $booking = Booktable::all();
        return view('booktable.index', ['booking' => $booking]);
    }

    public function edit(Booktable $order)
    {
        return view('booking.edit', compact('booking'));
    }


    public function update(Request $request, Booktable $booking)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $booking->update([
            'status' => $request->status,
            // tambahkan field lain yang perlu diupdate
        ]);
        FacadesAlert::success('Success', 'book a table updated successfully!');
        return redirect()->route('booking-list');
    }

    public function destroy($id)
    {
        $booking = Booktable::findOrFail($id);
        if ($booking->img && file_exists(public_path($booking->img))) {
            unlink(public_path($booking->img));
        }
        $booking->delete();
        FacadesAlert::success('Success', 'book a table deleted successfully!');
        return redirect()->route('booking-list')->with('success', 'book a table deleted successfully');
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
        FacadesAlert::success('Success', 'book a table restored successfully!');
        return redirect()->route('booking.trash');
    }

    public function forceDelete($id)
    {
        // dd($id);
        $booking = Booktable::onlyTrashed()->findOrFail($id);
        $booking->forceDelete();
        FacadesAlert::success('Success', 'book a table deleted successfully!');
        return redirect()->route('booking.trash');
    }
    public function restoreAll()
    {
        Booktable::onlyTrashed()->restore();
        FacadesAlert::success('Success', 'All book a table restored successfully!');
        return redirect()->route('booking.trash');
    }

    public function hapusSemua()
    {
        $booking = Booktable::onlyTrashed()->get();
        // dd($booking);
        foreach ($booking as $booking) {
            $booking->forceDelete();
        }
        FacadesAlert::success('Success', 'All book a table permanently deleted successfully!');
        return redirect()->route('booking.trash');
    }
}

