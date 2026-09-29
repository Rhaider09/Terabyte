<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', ['settings' => Setting::pluck('value', 'key')]);
    }

    public function update(Request $request)
    {
        $keys = ['site_name', 'site_name_title', 'phone', 'whatsapp', 'email', 'address', 'hero_title', 'hero_subtitle', 'hero_site_name', 'hero_Distraction',];
        foreach ($keys as $key) {
            Setting::setValue($key, $request->input($key, ''));
        }
        return back()->with('success', 'Settings updated.');
    }
}
