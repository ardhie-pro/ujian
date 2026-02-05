<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingBanner;
use Illuminate\Support\Facades\Storage;

class LandingBannerController extends Controller
{
    public function index()
    {
        $banner = LandingBanner::first();
        return view('admin.landing.banner.index', compact('banner'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = LandingBanner::first();
        if (!$banner) {
            $banner = new LandingBanner();
        }

        $data = $request->only(['title', 'description', 'button_text', 'button_link', 'is_active']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('landing/images/banner'), $imageName);
            $data['image'] = 'landing/images/banner/' . $imageName;
        }

        $banner->fill($data);
        $banner->save();

        return redirect()->route('landing-banner.index')->with('success', 'Banner updated successfully');
    }
}
