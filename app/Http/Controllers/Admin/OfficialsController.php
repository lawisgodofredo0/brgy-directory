<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Official;

class OfficialsController extends Controller
{
    public function index()
    {
        $officials = Official::all();
        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        return view('admin.officials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'position'         => 'required|string|max:255',
            'phone'            => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'responsibilities' => 'nullable|string',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'first_name', 'last_name', 'position', 'phone', 'email', 'responsibilities'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('officials_photos', 'public');
            $data['photo'] = $path;
        }

        Official::create($data);

        return redirect()->route('admin.officials.index')
                         ->with('success', 'Official added successfully!');
    }

    public function edit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, Official $official)
    {
        $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'position'         => 'required|string|max:255',
            'phone'            => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'responsibilities' => 'nullable|string',
            'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only([
            'first_name', 'last_name', 'position', 'phone', 'email', 'responsibilities'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('officials_photos', 'public');
            $data['photo'] = $path;
        }

        $official->update($data);

        return redirect()->route('admin.officials.index')
                         ->with('success', 'Official updated successfully!');
    }

    public function destroy(Official $official)
    {
        // Optionally: delete old photo file from storage if needed
        $official->delete();
        return redirect()->route('admin.officials.index')
                         ->with('success', 'Official deleted!');
    }
}
