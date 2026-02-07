<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingTestimonial;

class LandingTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = LandingTestimonial::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.landing.testimonial.index', compact('testimonials'));
    }

    public function storePublic(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'photo' => 'nullable|image|max:1024',
        ]);

        $data = $request->all();
        $data['is_active'] = false; // Default inactive for user submission

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('landing/images/testimonial'), $filename);
            $data['photo'] = 'landing/images/testimonial/' . $filename;
        }

        LandingTestimonial::create($data);

        return redirect()->back()->with('success_testimonial', 'Terima kasih! Pengalaman Anda telah dikirim dan akan ditinjau oleh tim kami.');
    }

    public function update(Request $request, LandingTestimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'photo' => 'nullable|image|max:1024',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
                unlink(public_path($testimonial->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('landing/images/testimonial'), $filename);
            $data['photo'] = 'landing/images/testimonial/' . $filename;
        }

        $testimonial->update($data);

        return redirect()->route('landing-testimonial.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(LandingTestimonial $testimonial)
    {
        if ($testimonial->photo && file_exists(public_path($testimonial->photo))) {
            unlink(public_path($testimonial->photo));
        }
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }

    public function edit(LandingTestimonial $testimonial)
    {
        return view('admin.landing.testimonial.edit', compact('testimonial'));
    }
}
