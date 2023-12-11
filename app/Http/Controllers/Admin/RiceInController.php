<?php

namespace App\Http\Controllers\Admin;

use App\Models\RiceIn;
use App\Models\TotalRice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;

class RiceInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.rice.in.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.rice.in.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|string',
            'source' => 'required|string',
            'contributor_name' => 'required|string',
        ]);

        $quantity = str_replace(['.', ','], '', $validated['quantity']);
        $validated['quantity'] = filter_var($quantity, FILTER_VALIDATE_FLOAT) ?: (int)$quantity;

        RiceIn::create($validated);

        $existingTotal = TotalRice::orderBy('created_at', 'desc')->first();

        $newTotal = $existingTotal ? $existingTotal->total + $validated['quantity'] : $validated['quantity'];

        if ($existingTotal) {
            $existingTotal->update(['total' => $newTotal]);
        } else {
            TotalRice::create(['total' => $newTotal]);
        }

        // TotalRice::updateOrCreate(
        //     [],
        //     ['total' => DB::raw('total + ' . $validated['quantity'])]
        // );

        notify()->success('Added successfully!');
        return redirect()->route('rice-in.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $HashId)
    {
        $id = Hashids::decode($HashId)[0];
        return view('pages.admin.rice.in.edit', [
            'data' => RiceIn::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|string',
            'source' => 'required|string',
            'contributor_name' => 'required|string',
        ]);

        $quantity = str_replace(['.', ','], '', $validated['quantity']);
        $validated['quantity'] = filter_var($quantity, FILTER_VALIDATE_FLOAT) ?: (int)$quantity;

        // Get data RiceIn before edit
        $riceIn = RiceIn::findOrFail($id);
        $oldQuantity = $riceIn->quantity;

        // Updated data RiceIn with new value
        $riceIn->update($validated);

        // Menghitung perbedaan antara nilai baru dan nilai lama
        $difference = $validated['quantity'] - $oldQuantity;

        // Get data last TotalRice
        $existingTotal = TotalRice::orderBy('created_at', 'desc')->first();

        // Menghitung Total Rice yang baru
        $newTotal = $existingTotal ? $existingTotal->total + $difference : $difference;

        // Updated value Total Rice
        if ($existingTotal) {
            $existingTotal->update(['total' => $newTotal]);
        } else {
            TotalRice::create(['total' => $newTotal]);
        }

        notify()->success('Updated successfully!');
        return redirect()->route('rice-in.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Hashid)
    {
        $id = Hashids::decode($Hashid)[0];

        // Mengambil data RiceIn yang akan dihapus
        $riceIn = RiceIn::findOrFail($id);

        // Menghitung perbedaan antara nilai yang akan dihapus dan 0
        $difference = 0 - $riceIn->quantity;

        // Menghapus data RiceIn
        $riceIn->delete();

        // Mengambil data TotalRice terakhir
        $existingTotal = TotalRice::orderBy('created_at', 'desc')->first();

        if ($existingTotal) {
            // Menghitung Total Rice yang baru setelah penghapusan data RiceIn
            $newTotal = $existingTotal->total + $difference;

            // Memperbarui nilai Total Rice
            $existingTotal->update(['total' => $newTotal]);
        }

        notify()->success('Deleted successfully!');
        return redirect()->route('rice-in.index');
    }
}