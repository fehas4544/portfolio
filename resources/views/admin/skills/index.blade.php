@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Skill Management</h1>
        <p class="text-slate-500 font-medium">Configure your professional technical and creative skills</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="btn-gradient">
        Add New Skill
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Dev Skills -->
    <div class="glass-card flex flex-col h-full">
        <div class="p-6 border-b border-slate-100 bg-blue-50/30">
            <h3 class="font-bold text-blue-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                Development
            </h3>
        </div>
        <div class="p-6 flex-1 space-y-4">
            @forelse ($skills->where('category', 'development') as $skill)
                <div class="flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg group transition-colors">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-bold text-slate-700">{{ $skill->name }}</span>
                            <span class="text-xs font-bold text-blue-600">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-blue-600 h-full rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    <div class="ml-4 opacity-0 group-hover:opacity-100 flex items-center space-x-2 transition-all">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-400 hover:text-blue-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="text-slate-400 hover:text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h6"></path></svg></button></form>
                    </div>
                </div>
            @empty
                <p class="text-center text-slate-400 py-4 text-sm">No dev skills yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Design Skills -->
    <div class="glass-card flex flex-col h-full">
        <div class="p-6 border-b border-slate-100 bg-purple-50/30">
            <h3 class="font-bold text-purple-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Graphic Design
            </h3>
        </div>
        <div class="p-6 flex-1 space-y-4">
            @forelse ($skills->where('category', 'design') as $skill)
                <div class="flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg group transition-colors">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-bold text-slate-700">{{ $skill->name }}</span>
                            <span class="text-xs font-bold text-purple-600">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-purple-600 h-full rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    <div class="ml-4 opacity-0 group-hover:opacity-100 flex items-center space-x-2 transition-all">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-400 hover:text-purple-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="text-slate-400 hover:text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h6"></path></svg></button></form>
                    </div>
                </div>
            @empty
                <p class="text-center text-slate-400 py-4 text-sm">No design skills yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Admin Skills -->
    <div class="glass-card flex flex-col h-full">
        <div class="p-6 border-b border-slate-100 bg-orange-50/30">
            <h3 class="font-bold text-orange-700 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Administration
            </h3>
        </div>
        <div class="p-6 flex-1 space-y-4">
            @forelse ($skills->where('category', 'administration') as $skill)
                <div class="flex items-center justify-between p-2 hover:bg-slate-50 rounded-lg group transition-colors">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-bold text-slate-700">{{ $skill->name }}</span>
                            <span class="text-xs font-bold text-orange-600">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-orange-600 h-full rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    <div class="ml-4 opacity-0 group-hover:opacity-100 flex items-center space-x-2 transition-all">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-slate-400 hover:text-orange-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button type="submit" class="text-slate-400 hover:text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h6"></path></svg></button></form>
                    </div>
                </div>
            @empty
                <p class="text-center text-slate-400 py-4 text-sm">No admin skills yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
