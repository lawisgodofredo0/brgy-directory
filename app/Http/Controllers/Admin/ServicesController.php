<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Official;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $officials = Official::all();
        return view('admin.services.create', compact('officials'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'official_id'  => 'nullable|exists:officials,id',
            'office_hours' => 'nullable|string|max:255',
        ]);
            // ✅ Check if empty and set default manually
    if (empty($validatedData['office_hours'])) {
        $validatedData['office_hours'] = 'By Appointment';
    }


        Service::create($validatedData);
        
        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service added successfully!');
    }

    public function edit(Service $service)
    {
        $officials = Official::all();
        return view('admin.services.edit', compact('service', 'officials'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'official_id'  => 'nullable|exists:officials,id',
            'office_hours' => 'nullable|string|max:255',
        ]);

        $service->update($validatedData);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted!');
    }
}
