@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Profile Settings</h1>
    <p class="text-slate-500 font-medium">Update your public portfolio information</p>
</div>

<div class="max-w-4xl">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="glass-card p-8 bg-white/50 backdrop-blur-sm border border-slate-200/60 rounded-3xl shadow-xl">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                Basic Information
            </h2>
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Display Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none bg-white/50">
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-semibold text-slate-700 mb-2">Job Role / Title</label>
                    <input type="text" name="role" id="role" value="{{ old('role', $profile->role) }}" required placeholder="e.g. Full Stack Developer"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none bg-white/50">
                    @error('role') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-semibold text-slate-700 mb-2">Professional Bio</label>
                    <textarea name="bio" id="bio" rows="4" required
                              class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none bg-white/50">{{ old('bio', $profile->bio) }}</textarea>
                    @error('bio') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Files & Assets -->
        <div class="glass-card p-8 bg-white/50 backdrop-blur-sm border border-slate-200/60 rounded-3xl shadow-xl">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                <span class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                </span>
                Assets & Media
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Profile Image -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-4">Profile Photo</label>
                    <div class="flex items-center space-x-6">
                        <div class="h-24 w-24 rounded-2xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden">
                            @if($profile->image)
                                <img src="{{ asset('storage/' . $profile->image) }}" class="h-full w-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="image" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                            <p class="mt-2 text-xs text-slate-500 font-medium">PNG, JPG or WebP. Max 5MB.</p>
                        </div>
                    </div>
                </div>

                <!-- CV File -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-4">Curriculum Vitae (PDF)</label>
                    <div class="flex items-center space-x-6">
                        <div class="h-24 w-24 rounded-2xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="cv_path" id="cv_path" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-all">
                            <p class="mt-2 text-xs text-slate-500 font-medium">
                                @if($profile->cv_path)
                                    Current CV is uploaded. Max 10MB.
                                @else
                                    Only PDF files accepted. Max 10MB.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- About Image -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-4">About Section Photo</label>
                    <div class="flex items-center space-x-6">
                        <div class="h-24 w-24 rounded-2xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden">
                            @if($profile->about_image)
                                <img src="{{ asset('storage/' . $profile->about_image) }}" class="h-full w-full object-cover">
                            @else
                                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="about_image" id="about_image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                            <p class="mt-2 text-xs text-slate-500 font-medium">PNG, JPG or WebP. Max 5MB.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Connections -->
        <div class="glass-card p-8 bg-white/50 backdrop-blur-sm border border-slate-200/60 rounded-3xl shadow-xl">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                <span class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </span>
                Social Connections
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $platforms = [
                        'linkedin' => ['label' => 'LinkedIn Profile', 'icon' => 'fa-brands fa-linkedin-in'],
                        'github'   => ['label' => 'GitHub Profile', 'icon' => 'fa-brands fa-github'],
                        'twitter'  => ['label' => 'Twitter / X Profile', 'icon' => 'fa-brands fa-x-twitter'],
                        'email'    => ['label' => 'Public Email Address', 'icon' => 'fa-solid fa-envelope']
                    ];
                @endphp
                
                @foreach($platforms as $key => $platform)
                    <div>
                        <label for="social_{{ $key }}" class="block text-sm font-semibold text-slate-700 mb-2">{{ $platform['label'] }}</label>
                        <div class="relative group">
                            <input type="text" name="social_links[{{ $key }}]" id="social_{{ $key }}" 
                                   value="{{ old('social_links.'.$key, $profile->social_links[$key] ?? '') }}"
                                   placeholder="https://..."
                                   class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all outline-none bg-white/50">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                <i class="{{ $platform['icon'] }} text-lg"></i>
                            </div>
                        </div>
                        <p class="mt-1 text-[11px] text-slate-400">Example: https://{{ $key }}.com/your-username</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="px-8 py-3 text-sm font-bold text-slate-600 hover:text-slate-800 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transform hover:-translate-y-1 transition-all">
                Update Portfolio Profile
            </button>
        </div>
    </form>
</div>
@endsection
