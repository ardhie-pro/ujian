<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LandingCtaSection;
use App\Models\LandingCtaButton;

class LandingCtaController extends Controller
{
    public function index()
    {
        $section = LandingCtaSection::first();
        $buttons = LandingCtaButton::orderBy('order')->get();
        return view('admin.landing.cta.index', compact('section', 'buttons'));
    }

    public function updateSection(Request $request)
    {
        $section = LandingCtaSection::first();
        if (!$section) {
            $section = new LandingCtaSection();
        }
        $section->fill($request->all())->save();
        return redirect()->back()->with('success', 'CTA Section text updated');
    }

    public function storeButton(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'icon' => 'required',
        ]);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        LandingCtaButton::create($data);
        return redirect()->back()->with('success', 'CTA Button added');
    }

    public function updateButton(Request $request, LandingCtaButton $button)
    {
        $request->validate([
            'label' => 'required',
            'icon' => 'required',
        ]);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $button->update($data);
        return redirect()->route('landing-cta.index')->with('success', 'CTA Button updated');
    }

    public function destroyButton(LandingCtaButton $button)
    {
        $button->delete();
        return redirect()->back()->with('success', 'CTA Button deleted');
    }

    public function editButton(LandingCtaButton $button)
    {
        return view('admin.landing.cta.edit', compact('button'));
    }
}
