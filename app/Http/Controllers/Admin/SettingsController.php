<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Http\Requests\Admin\StoreSettingsRequest;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSettings::first();
        return view('admin.settings', compact('settings'));
    }

    public function update(StoreSettingsRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            $validated['favicon_path'] = $request->file('favicon')->store('settings', 'public');
        }
        if ($request->hasFile('donation_qr_code')) {
            $validated['donation_qr_code_path'] = $request->file('donation_qr_code')->store('settings', 'public');
        }

        $settings = SiteSettings::first();
        if ($settings) {
            $settings->update($validated);
        } else {
            SiteSettings::create($validated);
        }

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }
}
