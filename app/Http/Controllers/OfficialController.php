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
}
