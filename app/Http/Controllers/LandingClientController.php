<?php

namespace App\Http\Controllers;

use App\Models\LandingClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LandingClientController extends Controller
{
    public function index()
    {
        $clients = LandingClient::orderBy('order')->get();
        return view('admin.landing.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.landing.client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['logo']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('landing/images/clients'), $imageName);
            $data['logo'] = 'landing/images/clients/' . $imageName;
        }

        LandingClient::create($data);

        return redirect()->route('landing-client.index')->with('success', 'Client created successfully');
    }

    public function edit(LandingClient $landing_client)
    {
        return view('admin.landing.client.edit', compact('landing_client'));
    }

    public function update(Request $request, LandingClient $landing_client)
    {
        $request->validate([
            'logo' => 'nullable|image|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['logo']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($landing_client->logo && File::exists(public_path($landing_client->logo))) {
                File::delete(public_path($landing_client->logo));
            }
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('landing/images/clients'), $imageName);
            $data['logo'] = 'landing/images/clients/' . $imageName;
        }

        $landing_client->update($data);

        return redirect()->route('landing-client.index')->with('success', 'Client updated successfully');
    }

    public function destroy(LandingClient $landing_client)
    {
        if ($landing_client->logo && File::exists(public_path($landing_client->logo))) {
            File::delete(public_path($landing_client->logo));
        }
        $landing_client->delete();

        return redirect()->route('landing-client.index')->with('success', 'Client deleted successfully');
    }
}
