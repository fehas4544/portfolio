@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Work Experience</h1>
        <p class="text-slate-500 font-medium">Manage your professional career timeline</p>
    </div>
    <a href="{{ route('admin.experiences.create') }}" class="btn-gradient">
        Add New Experience
    </a>
</div>

<div class="glass-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Company & Role</th>
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Duration</th>
                    <th class="px-8 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($experiences as $experience)
                    <tr class="hover:bg-slate-50/30 transition-colors">
                        <td class="px-8 py-4">
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">{{ $experience->role }}</h4>
                                <p class="text-xs text-blue-600 font-bold uppercase tracking-tighter">{{ $experience->company }}</p>
                            </div>
                        </td>
                        <td class="px-8 py-4 text-sm font-medium text-slate-500">
                            {{ $experience->duration }}
                        </td>
                        <td class="px-8 py-4 text-right">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-slate-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v2m3 4h6"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-8 py-12 text-center text-slate-500 font-medium">No experience found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
