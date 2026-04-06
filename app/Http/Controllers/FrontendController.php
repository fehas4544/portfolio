<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class FrontendController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::all();
        $featured_projects = Project::where('is_featured', true)->get();
        $projects = Project::latest()->get();
        $experiences = Experience::latest()->get();
        $education = Education::latest()->get();
        $certificates = Certificate::latest()->get();

        return view('welcome', compact(
            'profile', 'skills', 'featured_projects', 'projects',
            'experiences', 'education', 'certificates'
        ));
    }
}
