<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingServiceSection;
use App\Models\LandingService;

class LandingServiceController extends Controller
{
    public function index()
    {
        $services = LandingService::orderBy('order')->get();
        $section = LandingServiceSection::first();
        return view('admin.landing.service.index', compact('services', 'section'));
    }

    public function updateSection(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $section = LandingServiceSection::first();
        if (!$section) {
            $section = new LandingServiceSection();
        }

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($section->image && file_exists(public_path($section->image))) {
                unlink(public_path($section->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('landing/images/feature'), $filename);
            $data['image'] = 'landing/images/feature/' . $filename;
        }

        $section->fill($data)->save();

        return redirect()->back()->with('success', 'Service section settings updated successfully');
    }

    public function create()
    {
        return view('admin.landing.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        LandingService::create($data);

        return redirect()->route('landing-service.index')->with('success', 'Service card created successfully');
    }

    public function edit(LandingService $landing_service)
    {
        return view('admin.landing.service.edit', compact('landing_service'));
    }

    public function update(Request $request, LandingService $landing_service)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $landing_service->update($data);

        return redirect()->route('landing-service.index')->with('success', 'Service card updated successfully');
    }

    public function destroy(LandingService $landing_service)
    {
        $landing_service->delete();

        return redirect()->route('landing-service.index')->with('success', 'Service card deleted successfully');
    }
}
