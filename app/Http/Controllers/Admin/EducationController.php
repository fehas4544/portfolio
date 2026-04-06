<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::latest()->get();

        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education record added successfully.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('admin.education.index')->with('success', 'Education record removed successfully.');
    }
}
