<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate([], [
            'name' => 'Portfolio Admin',
            'role' => 'Software Developer',
            'bio' => 'A multi-role professional specializing in Software Development, Graphic Design, and Management.',
            'social_links' => [
                'linkedin' => 'https://linkedin.com',
                'github' => 'https://github.com',
                'twitter' => 'https://twitter.com',
            ],
        ]);

        $platforms = ['linkedin' => 'LinkedIn Profile', 'github' => 'GitHub Handle', 'twitter' => 'Twitter / X Profile'];

        return view('admin.profile.edit', compact('profile', 'platforms'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrCreate([]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'about_image' => 'nullable|image|max:5120',
            'cv_path' => 'nullable|file|mimes:pdf|max:10240',
            'social_links' => 'nullable|array',
        ]);

        if ($request->has('social_links')) {
            $links = $request->input('social_links');
            foreach ($links as $key => $value) {
                if ($value) {
                    $val = ltrim($value, '# ');
                    if ($key === 'email') {
                        // Keep as is for emails
                        $links[$key] = $val;
                    } elseif (! preg_match('~^(?:f|ht)tps?://~i', $val)) {
                        $links[$key] = 'https://'.ltrim($val, '/');
                    } else {
                        $links[$key] = $val;
                    }
                }
            }
            $validated['social_links'] = $links;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('profile', 'public');
        }

        if ($request->hasFile('about_image')) {
            $validated['about_image'] = $request->file('about_image')->store('profile', 'public');
        }

        if ($request->hasFile('cv_path')) {
            $validated['cv_path'] = $request->file('cv_path')->store('cv', 'public');
        }

        $profile->fill($validated)->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
