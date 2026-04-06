@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.skills.index') }}" class="text-blue-600 font-bold flex items-center mb-2 hover:translate-x-1 transition-transform">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Back to List
    </a>
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Add New Skill</h1>
    <p class="text-slate-500 font-medium">Add a new expertise to your professional profile</p>
</div>

<div class="glass-card max-w-2xl">
    <form action="{{ route('admin.skills.store') }}" method="POST" class="p-8 space-y-6" x-data="{ range: 50 }">
        @csrf
        
        <div class="space-y-2">
            <label class="text-sm font-bold text-slate-700">Skill Name</label>
            <input type="text" name="name" required value="{{ old('name') }}" 
                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none"
                placeholder="e.g. Laravel, Figma, Agile">
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-2">
            <label class="text-sm font-bold text-slate-700">Category</label>
            <select name="category" required 
                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none bg-white">
                <option value="development">Development</option>
                <option value="design">Graphic Design</option>
                <option value="administration">Administration & Management</option>
            </select>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class="text-sm font-bold text-slate-700">Proficiency (%)</label>
                <span class="text-xl font-bold text-blue-600" x-text="range + '%'">50%</span>
            </div>
            <input type="range" name="proficiency" min="0" max="100" x-model="range"
                class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-blue-600">
            <div class="flex justify-between text-xs text-slate-400 font-bold px-1 uppercase tracking-tighter">
                <span>Beginner</span>
                <span>Intermediate</span>
                <span>Expert</span>
            </div>
        </div>

        <div class="pt-6 border-t border-slate-100">
            <button type="submit" class="btn-gradient w-full md:w-auto">
                Add Skill
            </button>
        </div>
    </form>
</div>
@endsection
