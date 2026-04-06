<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:software,design,management',
            'image' => 'nullable|image|max:5120',
            'link' => 'nullable|string|max:255',
            'github_link' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        // Sanitize links
        foreach (['link', 'github_link'] as $field) {
            if ($request->filled($field) && ! preg_match('~^(?:f|ht)tps?://~i', $request->input($field))) {
                $validated[$field] = 'https://'.ltrim($request->input($field), '/');
            }
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/projects', 'public_folder');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:software,design,management',
            'image' => 'nullable|image|max:5120',
            'link' => 'nullable|string|max:255',
            'github_link' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        // Sanitize links
        foreach (['link', 'github_link'] as $field) {
            if ($request->filled($field) && ! preg_match('~^(?:f|ht)tps?://~i', $request->input($field))) {
                $validated[$field] = 'https://'.ltrim($request->input($field), '/');
            }
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/projects', 'public_folder');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
