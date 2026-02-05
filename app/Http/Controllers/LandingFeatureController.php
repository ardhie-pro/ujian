<?php

namespace App\Http\Controllers;

use App\Models\LandingFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LandingFeatureController extends Controller
{
    public function index()
    {
        $features = LandingFeature::orderBy('order')->get();
        return view('admin.landing.feature.index', compact('features'));
    }

    public function create()
    {
        return view('admin.landing.feature.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'testimonial_author_image' => 'nullable|image|max:1024',
        ]);

        $data = $request->except(['image', 'testimonial_author_image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imageName = time() . '_f.' . $request->image->extension();
            $request->image->move(public_path('landing/images/feature'), $imageName);
            $data['image'] = 'landing/images/feature/' . $imageName;
        }

        if ($request->hasFile('testimonial_author_image')) {
            $imageName = time() . '_t.' . $request->testimonial_author_image->extension();
            $request->testimonial_author_image->move(public_path('landing/images/testimonial'), $imageName);
            $data['testimonial_author_image'] = 'landing/images/testimonial/' . $imageName;
        }

        LandingFeature::create($data);

        return redirect()->route('landing-feature.index')->with('success', 'Feature created successfully');
    }

    public function edit(LandingFeature $landing_feature)
    {
        return view('admin.landing.feature.edit', compact('landing_feature'));
    }

    public function update(Request $request, LandingFeature $landing_feature)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'testimonial_author_image' => 'nullable|image|max:1024',
        ]);

        $data = $request->except(['image', 'testimonial_author_image']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($landing_feature->image && File::exists(public_path($landing_feature->image))) {
                File::delete(public_path($landing_feature->image));
            }
            $imageName = time() . '_f.' . $request->image->extension();
            $request->image->move(public_path('landing/images/feature'), $imageName);
            $data['image'] = 'landing/images/feature/' . $imageName;
        }

        if ($request->hasFile('testimonial_author_image')) {
            if ($landing_feature->testimonial_author_image && File::exists(public_path($landing_feature->testimonial_author_image))) {
                File::delete(public_path($landing_feature->testimonial_author_image));
            }
            $imageName = time() . '_t.' . $request->testimonial_author_image->extension();
            $request->testimonial_author_image->move(public_path('landing/images/testimonial'), $imageName);
            $data['testimonial_author_image'] = 'landing/images/testimonial/' . $imageName;
        }

        $landing_feature->update($data);

        return redirect()->route('landing-feature.index')->with('success', 'Feature updated successfully');
    }

    public function destroy(LandingFeature $landing_feature)
    {
        if ($landing_feature->image && File::exists(public_path($landing_feature->image))) {
            File::delete(public_path($landing_feature->image));
        }
        if ($landing_feature->testimonial_author_image && File::exists(public_path($landing_feature->testimonial_author_image))) {
            File::delete(public_path($landing_feature->testimonial_author_image));
        }
        $landing_feature->delete();

        return redirect()->route('landing-feature.index')->with('success', 'Feature deleted successfully');
    }
}
