@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.projects.index') }}" class="text-blue-600 font-bold flex items-center mb-2 hover:translate-x-1 transition-transform">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Back to List
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Edit Project</h1>
    <p class="text-slate-500 font-medium">Update your portfolio gallery entry</p>
</div>

<div class="glass-card max-w-4xl">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700">Project Title</label>
                <input type="text" name="title" required value="{{ old('title', $project->title) }}" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                    placeholder="e.g. Modern E-commerce Platform">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700">Category</label>
                <select name="category" required 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none bg-white">
                    <option value="software" {{ old('category', $project->category) == 'software' ? 'selected' : '' }}>Software Project</option>
                    <option value="design" {{ old('category', $project->category) == 'design' ? 'selected' : '' }}>Graphic Design</option>
                    <option value="management" {{ old('category', $project->category) == 'management' ? 'selected' : '' }}>Management Project</option>
                </select>
            </div>
        </div>

        <div class="space-y-2">
            <label class="text-sm font-bold text-slate-700">Description</label>
            <textarea name="description" rows="4" required
                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                placeholder="Detailed project overview...">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700">Live Link (Optional)</label>
                <input type="text" name="link" value="{{ old('link', $project->link) }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                    placeholder="https://example.com">
                <p class="text-[10px] text-slate-400">e.g. example.com or http://example.com</p>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700">GitHub Link (Optional)</label>
                <input type="text" name="github_link" value="{{ old('github_link', $project->github_link) }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                    placeholder="https://github.com/username/repo">
                <p class="text-[10px] text-slate-400">e.g. github.com/username/repo</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <div class="space-y-2">
                <label class="text-sm font-bold text-slate-700">Project Image</label>
                @if($project->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $project->image) }}" class="h-20 w-32 object-cover rounded-lg">
                </div>
                @endif
                <input type="file" name="image" 
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                <p class="text-slate-400 text-xs">Recommended: 1200x800px, max 5MB</p>
            </div>

            <div class="flex items-center space-x-3 pt-6">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded-lg border-slate-300 focus:ring-blue-500">
                <label for="is_featured" class="text-sm font-bold text-slate-700">Mark as Featured Project</label>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100">
            <button type="submit" class="btn-gradient w-full md:w-auto">
                Update Project
            </button>
        </div>
    </form>
</div>
@endsection
