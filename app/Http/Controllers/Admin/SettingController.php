<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'site_title' => 'string|max:255',
            'zakatel_visi' => 'string',
            'zakatel_misi' => 'string',
        ]);

        foreach ($request->except('_token') as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                if ($request->hasFile($key) && in_array($key, ['favicon', 'logo'])) {
                    if ($setting->{$key}) {
                        // Hapus file lama
                        Storage::delete($setting->{$key});
                    }
                    // Simpan file baru
                    $filename = 'images/general/' . $key . '.webp';
                    $image = Image::make($request->file($key))->encode('webp', 80);
                    Storage::disk('public')->put($filename, $image->stream());
                    // Simpan nama file ke dalam kolom 'value' pada objek Setting
                    $setting->value = $filename;
                } else {
                    $setting->value = $value;
                }
                $setting->save();
            }
        }

        Cache::forget('settings');
        notify()->success('Updated successfully ✅');
        return redirect()->back();
    }

    public function appearance()
    {
        $setting = Cache::get('settings');

        if (!$setting) {
            $setting = Setting::pluck('value', 'key')->toArray();
        }
        return view('pages.admin.settings.appearance', compact('setting'));
    }

    public function visionMission()
    {
        $setting = Cache::get('settings');

        if (!$setting) {
            $setting = Setting::pluck('value', 'key')->toArray();
        }
        return view('pages.admin.settings.vision-mission', compact('setting'));
    }

    public function legality()
    {
        $setting = Cache::get('settings');

        if (!$setting) {
            $setting = Setting::pluck('value', 'key')->toArray();
        }
        return view('pages.admin.settings.legality', compact('setting'));
    }

    public function history()
    {
        $setting = Cache::get('settings');

        if (!$setting) {
            $setting = Setting::pluck('value', 'key')->toArray();
        }
        return view('pages.admin.settings.history', compact('setting'));
    }

    public function clearCache()
    {
        Cache::flush();
        notify()->success('Updated successfully ✅');
        return redirect()->back();
    }

}
