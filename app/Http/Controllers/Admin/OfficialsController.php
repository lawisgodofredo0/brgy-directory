<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Official;

class OfficialController extends Controller
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
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        Official::create($request->only('name', 'position', 'contact'));

        return redirect()->route('admin.officials.index')->with('success', 'Official added successfully!');
    }

    public function edit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function update(Request $request, Official $official)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        $official->update($request->only('name', 'position', 'contact'));

        return redirect()->route('admin.officials.index')->with('success', 'Official updated successfully!');
    }

    public function destroy(Official $official)
    {
        $official->delete();
        return redirect()->route('admin.officials.index')->with('success', 'Official deleted!');
    }
}
