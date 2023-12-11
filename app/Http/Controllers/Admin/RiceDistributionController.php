<?php

namespace App\Http\Controllers\Admin;

use App\Models\TotalRice;
use Illuminate\Support\Str;
use App\Models\RiceDistribution;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RiceDistributionRequest;

class RiceDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.rice-distribution.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.rice-distribution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RiceDistributionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RiceDistributionRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $filename = 'images/rice-distribution/thumbnail' . date('_Y-m-d_His_') . Str::lower(Str::random(6)) . '.webp';
            $image = Image::make($request->file('image'))->encode('webp', 80);
            Storage::disk('public')->put($filename, $image->stream());
            $validated['image'] = $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);
        try {
            $riceDistribution = RiceDistribution::create($validated);
            if ($riceDistribution) {
                notify()->success('Rice Distribution created successfully ✅');
                return redirect()->route('rice-distributions.index');
            }
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Edit the specified resource in storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $hashId)
    {
        $id = Hashids::decode($hashId);
        $data = RiceDistribution::findOrFail($id)->first();
        return view('pages.admin.rice-distribution.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RiceDistributionRequest  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RiceDistributionRequest $request, string $id)
    {
        $riceDistribution = RiceDistribution::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($riceDistribution->image);
            $filename = 'images/rice-distribution/thumbnail' . date('_Y-m-d_His_') . Str::lower(Str::random(6)) . '.webp';
            $image = Image::make($request->file('image'))->encode('webp', 80);
            Storage::disk('public')->put($filename, $image->stream());
            $validated['image'] = $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        try {
            $validatedQuantity = $validated['quantity_distributed']; // Simpan nilai baru yang diajukan

            // Periksa apakah stok cukup untuk perubahan ini
            $totalRice = TotalRice::first(); // Dapatkan total beras
            $currentQuantity = $riceDistribution->quantity_distributed; // Dapatkan nilai sekarang

            // Hitung selisih antara nilai baru yang diajukan dan nilai sekarang
            $difference = $validatedQuantity - $currentQuantity;

            // Jika selisih positif, pastikan stok mencukupi untuk menambahnya
            if ($difference > 0 && $difference > $totalRice->total) {
                notify()->error('Stok beras tidak mencukupi untuk distribusi ini.');
                return redirect()->back()->withInput(); // Kembalikan dengan input sebelumnya
            }

            // Jika selisih negatif, artinya ada pengurangan distribusi
            if ($difference < 0) {
                $totalRice->total += abs($difference); // Tambahkan perbedaan (pastikan nilai positif)
            }

            // Perbarui RiceDistribution jika stok cukup
            $update = $riceDistribution->update($validated);

            if ($update) {
                // Kurangi jumlah distribusi dari total stok jika selisih positif
                if ($difference > 0) {
                    $totalRice->total -= $difference;
                }

                $totalRice->save();

                notify()->success('Rice Distribution updated successfully ✅');
                return redirect()->route('rice-distributions.index');
            }
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $hashId)
    {
        $id = Hashids::decode($hashId); // Decode the encoded ID
        $riceDistribution = RiceDistribution::findOrFail($id)->first();

        if($riceDistribution) {
            Storage::disk('public')->delete($riceDistribution->image);
            $riceDistribution->delete();
            notify()->success('Rice Distribution deleted successfully ✅');
        } else {
            notify()->error('Rice Distribution not found ❌');
        }

        return redirect()->route('rice-distributions.index');
    }
}
