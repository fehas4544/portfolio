@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Project Management</h1>
        <p class="text-slate-500 font-medium">Manage your software, design, and management projects</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-gradient">
        Add New Project
    </a>
</div>

<div class="glass-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Project Details</th>
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Category</th>
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($projects as $project)
                    <tr class="hover:bg-slate-50/30 transition-colors">
                        <td class="px-8 py-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-lg bg-slate-100 mr-4 overflow-hidden flex-shrink-0">
                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">{{ $project->title }}</h4>
                                    <p class="text-xs text-slate-500 truncate max-w-xs">{{ Str::limit($project->description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <span class="px-3 py-1 text-xs font-bold rounded-full 
                                {{ $project->category === 'software' ? 'bg-blue-100 text-blue-600' : '' }}
                                {{ $project->category === 'design' ? 'bg-purple-100 text-purple-600' : '' }}
                                {{ $project->category === 'management' ? 'bg-orange-100 text-orange-600' : '' }}
                            ">
                                {{ ucfirst($project->category) }}
                            </span>
                        </td>
                        <td class="px-8 py-4">
                            @if ($project->is_featured)
                                <span class="flex items-center text-xs font-bold text-amber-500">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    Featured
                                </span>
                            @else
                                <span class="text-xs font-bold text-slate-400">Regular</span>
                            @endif
                        </td>
                        <td class="px-8 py-4 text-right">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h6"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-slate-500 font-medium">
                            No projects found. Start by adding your first masterpiece.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-4 bg-slate-50/50 border-t border-slate-100">
        {{ $projects->links() }}
    </div>
</div>
@endsection
