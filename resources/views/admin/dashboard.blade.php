@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">System Dashboard</h1>
    <p class="text-slate-500 font-medium">Real-time overview of your portfolio statistics</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <!-- Projects -->
    <div class="glass-card p-6 bg-gradient-to-br from-blue-50 to-white">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-100 rounded-xl text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <span class="text-xs font-bold text-blue-500 uppercase tracking-wider bg-white/50 px-2 py-1 rounded-md">Live</span>
        </div>
        <h3 class="text-4xl font-bold text-slate-800 mb-1 tabular-nums animate-pulse">{{ $stats['total_projects'] }}</h3>
        <p class="text-sm font-semibold text-slate-500">Portfolio Projects</p>
    </div>

    <!-- Skills -->
    <div class="glass-card p-6 bg-gradient-to-br from-indigo-50 to-white">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-indigo-100 rounded-xl text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <span class="text-xs font-bold text-indigo-500 uppercase tracking-wider bg-white/50 px-2 py-1 rounded-md">Skills</span>
        </div>
        <h3 class="text-4xl font-bold text-slate-800 mb-1 tabular-nums">{{ $stats['total_skills'] }}</h3>
        <p class="text-sm font-semibold text-slate-500">Industry Skills</p>
    </div>

    <!-- Messages -->
    <div class="glass-card p-6 bg-gradient-to-br from-emerald-50 to-white">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-emerald-100 rounded-xl text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
            </div>
            @if ($stats['unread_messages'] > 0)
                <span class="text-xs font-bold text-red-500 uppercase tracking-wider bg-red-100 px-2 py-1 rounded-md">New</span>
            @endif
        </div>
        <h3 class="text-4xl font-bold text-slate-800 mb-1 tabular-nums">{{ $stats['total_messages'] }}</h3>
        <p class="text-sm font-semibold text-slate-500">Contact Messages</p>
    </div>

    <!-- Unread Messages -->
    <div class="glass-card p-6 bg-gradient-to-br from-blue-50 to-white">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-100 rounded-xl text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-slate-800 mb-1 tabular-nums">{{ $stats['unread_messages'] }}</h3>
        <p class="text-sm font-semibold text-slate-500">Pending Actions</p>
    </div>
</div>

<!-- Recent Submissions -->
<div class="glass-card overflow-hidden">
    <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-xl font-bold text-slate-800">Quick Management</h2>
    </div>
    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-center p-8 border-2 border-dashed border-slate-200 rounded-2xl hover:border-blue-500 hover:bg-blue-50 transition-all group">
            <div class="text-center">
                <svg class="w-8 h-8 text-slate-400 group-hover:text-blue-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span class="font-bold text-slate-600 group-hover:text-blue-600">Add New Project</span>
            </div>
        </a>
        <a href="{{ route('admin.skills.create') }}" class="flex items-center justify-center p-8 border-2 border-dashed border-slate-200 rounded-2xl hover:border-indigo-500 hover:bg-indigo-50 transition-all group">
            <div class="text-center">
                <svg class="w-8 h-8 text-slate-400 group-hover:text-indigo-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span class="font-bold text-slate-600 group-hover:text-indigo-600">Add New Skill</span>
            </div>
        </a>
        <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-center p-8 border-2 border-dashed border-slate-200 rounded-2xl hover:border-emerald-500 hover:bg-emerald-50 transition-all group">
            <div class="text-center">
                <svg class="w-8 h-8 text-slate-400 group-hover:text-emerald-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                <span class="font-bold text-slate-600 group-hover:text-emerald-600">Read Messages</span>
            </div>
        </a>
    </div>
</div>
@endsection
