<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::query()
            ->when(request('type'), fn($query) => $query->where('type', request('type')))
            ->when(request('status'), fn($query) => $query->where('status', request('status')))
            ->latest()
            ->paginate(10);

        return view('institutions.index', compact('institutions'));
    }

    public function create()
    {
        return view('institutions.create');
    }

    public function show(Institution $institution)
    {
        return view('institutions.show', compact('institution'));
    }

    public function approve(Institution $institution)
    {
        $institution->update(['status' => 'sudah disetujui']);

        return back()->with('success', 'Institusi telah disetujui');
    }

}
