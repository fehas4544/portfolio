<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    public function index()
    {
        // ── Static Profile ──────────────────────────────────────────────
        $profile = (object) [
            'name'         => 'Fehas',
            'role'         => 'Software Developer & Graphic Designer',
            'bio'          => 'Passionate about crafting modern, high-performance web experiences with clean architecture, beautiful interfaces, and scalable systems. Based in Sri Lanka, available for freelance & full-time opportunities.',
            'image'        => 'images/hero.png',
            'about_image'  => 'images/design.png',
            'cv_path'      => null,   // e.g. 'cv.pdf' → place in public/images/cv.pdf
            'social_links' => [
                'github'   => 'https://github.com/',
                'linkedin' => 'https://linkedin.com/in/',
                'email'    => 'smfehas@gmail.com',
            ],
        ];

        // ── Static Skills ────────────────────────────────────────────────
        $skills = new Collection([
            (object)['name' => 'PHP / Laravel',        'proficiency' => 90, 'category' => 'development'],
            (object)['name' => 'JavaScript / Vue.js',  'proficiency' => 85, 'category' => 'development'],
            (object)['name' => 'MySQL / PostgreSQL',   'proficiency' => 80, 'category' => 'development'],
            (object)['name' => 'React / Next.js',      'proficiency' => 78, 'category' => 'development'],
            (object)['name' => 'Tailwind CSS',         'proficiency' => 88, 'category' => 'design'],
            (object)['name' => 'Figma / UI Design',    'proficiency' => 75, 'category' => 'design'],
            (object)['name' => 'Docker / DevOps',      'proficiency' => 70, 'category' => 'design'],
        ]);

        // ── Static Projects ──────────────────────────────────────────────
        $projects = new Collection([
            (object)[
                'id'          => 1,
                'title'       => 'LankaPOS',
                'description' => 'A full-featured point-of-sale system for Sri Lankan businesses with inventory management and reporting.',
                'category'    => 'Web App',
                'image'       => 'images/management.png',
                'link'        => null,
                'github_link' => 'https://github.com/',
            ],
            (object)[
                'id'          => 2,
                'title'       => 'Portfolio Website',
                'description' => 'Personal developer portfolio built with Laravel, featuring a dynamic admin panel and stunning UI.',
                'category'    => 'Portfolio',
                'image'       => 'images/design.png',
                'link'        => null,
                'github_link' => 'https://github.com/',
            ],
            (object)[
                'id'          => 3,
                'title'       => 'Graphic Design Work',
                'description' => 'A curated collection of branding, print, and digital design projects created with Adobe suite & Figma.',
                'category'    => 'Design',
                'image'       => 'images/hero.png',
                'link'        => null,
                'github_link' => null,
            ],
        ]);

        $featured_projects = $projects;

        // ── Static Education ─────────────────────────────────────────────
        $education = new Collection([
            (object)[
                'degree'      => 'Bachelor of Information Technology',
                'institution' => 'SLIIT – Sri Lanka Institute of Information Technology',
                'duration'    => '2022 – 2026',
                'description' => 'Specialising in software engineering, databases and web technologies.',
            ],
            (object)[
                'degree'      => 'Advanced Level (A/L)',
                'institution' => 'Sammanthurai Central College',
                'duration'    => '2018 – 2020',
                'description' => 'Technology stream.',
            ],
        ]);

        $experiences = new Collection([]);

        // ── Static Certificates ──────────────────────────────────────────
        $certificates = new Collection([
            (object)['id' => 1, 'name' => 'Laravel Certification',         'issuer' => 'Laracasts',        'date' => '2024'],
            (object)['id' => 2, 'name' => 'JavaScript Algorithms',         'issuer' => 'freeCodeCamp',     'date' => '2023'],
            (object)['id' => 3, 'name' => 'Responsive Web Design',         'issuer' => 'freeCodeCamp',     'date' => '2023'],
            (object)['id' => 4, 'name' => 'Adobe Photoshop Essentials',    'issuer' => 'Udemy',            'date' => '2022'],
            (object)['id' => 5, 'name' => 'Docker for Developers',         'issuer' => 'Udemy',            'date' => '2024'],
            (object)['id' => 6, 'name' => 'MySQL Database Administration', 'issuer' => 'Oracle Academy',   'date' => '2023'],
        ]);

        return view('welcome', compact(
            'profile', 'skills', 'featured_projects', 'projects',
            'experiences', 'education', 'certificates'
        ));
    }
}
