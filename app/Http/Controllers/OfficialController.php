<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    // Public listing of officials
    public function index()
    {
        // Get all officials ordered by position or name
        $officials = Official::orderBy('position')->get();
        return view('officials.index', compact('officials'));
    }

    // Public profile of one official
    public function show(Official $official)
    {
        return view('officials.show', compact('official'));
    }

    // Admin: show create form
    public function create()
    {
        return view('officials.create');
    }

    // Admin: save new official
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'phone'      => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:255',
            'responsibilities' => 'nullable|string',
            'photo'      => 'nullable|image|max:2048',
        ]);

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('official_photos', 'public');
            $data['photo'] = $path;
        }

        Official::create($data);

        return redirect()->route('admin.officials.index')->with('success', 'Official created.');
    }

    // Admin: show edit form
    public function edit(Official $official)
    {
        return view('officials.edit', compact('official'));
    }

    // Admin: update official
    public function update(Request $request, Official $official)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'position'   => 'required|string|max:255',
            'phone'      => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:255',
            'responsibilities' => 'nullable|string',
            'photo'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('official_photos', 'public');
            $data['photo'] = $path;
        }

        $official->update($data);

        return redirect()->route('admin.officials.index')->with('success', 'Official updated.');
    }

    // Admin: delete official
    public function destroy(Official $official)
    {
        $official->delete();
        return back()->with('success', 'Official deleted.');
    }
}
