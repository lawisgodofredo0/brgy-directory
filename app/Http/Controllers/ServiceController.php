<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Official;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Public listing
    public function index()
    {
        $services = Service::with('official')->get();
        return view('services.index', compact('services'));
    }

    // Public detail
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    // Admin: show create form
    public function create()
    {
        $officials = Official::all(); // to assign service to an official
        return view('services.create', compact('officials'));
    }

    // Admin: store new service
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'official_id' => 'nullable|exists:officials,id',
            'office_hours' => 'nullable|string|max:255',
        ]);

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success','Service created.');
    }

    // Admin: edit form
    public function edit(Service $service)
    {
        $officials = Official::all();
        return view('services.edit', compact('service','officials'));
    }

    // Admin: update
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'official_id' => 'nullable|exists:officials,id',
            'office_hours' => 'nullable|string|max:255',
        ]);

        $service->update($data);
        return redirect()->route('admin.services.index')->with('success','Service updated.');
    }

    // Admin: delete
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success','Service deleted.');
    }
}
