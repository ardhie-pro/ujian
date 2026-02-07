<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingVideo;

class LandingVideoController extends Controller
{
    public function index()
    {
        $video = LandingVideo::first();
        return view('admin.landing.video.index', compact('video'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_image' => 'nullable|image|max:3072',
            'video_url' => 'nullable|url',
        ]);

        $video = LandingVideo::first();
        if (!$video) {
            $video = new LandingVideo();
        }

        $data = $request->except('background_image');

        if ($request->hasFile('background_image')) {
            // Hapus gambar lama jika ada
            if ($video->background_image && file_exists(public_path($video->background_image))) {
                unlink(public_path($video->background_image));
            }
            $file = $request->file('background_image');
            $filename = time() . '_bg_' . $file->getClientOriginalName();
            $file->move(public_path('landing/images/backgrounds'), $filename);
            $data['background_image'] = 'landing/images/backgrounds/' . $filename;
        }

        $video->fill($data)->save();

        return redirect()->back()->with('success', 'Video Promo section updated successfully');
    }
}
