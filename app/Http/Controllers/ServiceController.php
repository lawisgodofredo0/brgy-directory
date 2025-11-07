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
}
