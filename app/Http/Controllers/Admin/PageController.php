<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $validated = $request->validated();
        $filename = 'images/page/thumbnail' . date('_Y-m-d_His_') . Str::lower(Str::random(6)) . '.webp';
        $image = Image::make($request->file('image'))->encode('webp', 80);
        Storage::disk('public')->put($filename, $image->stream());
        $validated['image'] = $filename;
        $validated['slug'] = Str::slug($validated['title']);
        try {
            $page = Page::create($validated);
            if ($page) {
                notify()->success('Page created successfully ✅');
                return redirect()->route('pages.index');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $hashId)
    {
        $id = Hashids::decode($hashId) [0] ?? abort(404);
        $page = Page::findOrFail($id);
        return view('pages.admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $filename = 'images/page/thumbnail' . date('_Y-m-d_His_') . Str::lower(Str::random(6)) . '.webp';
            $image = Image::make($request->file('image'))->encode('webp', 80);
            Storage::disk('public')->put($filename, $image->stream());
            $validated['image'] = $filename;
        }
        $validated['slug'] = Str::slug($validated['title']);
        try {
            $page = Page::findOrFail($id);
            $page->update($validated);
            if ($page) {
                notify()->success('Page updated successfully ✅');
                return redirect()->route('pages.index');
            }
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $page = Page::findOrFail($id);
            Storage::disk('public')->delete($page->image);
            $page->delete();
            if ($page) {
                notify()->success('Page deleted successfully ✅');
                return redirect()->route('pages.index');
            }
        } catch (\Exception $e) {
            notify()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
