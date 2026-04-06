@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.messages.index') }}" class="text-blue-600 font-bold flex items-center hover:translate-x-[-4px] transition-transform">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Back to Messages
    </a>
</div>

<div class="flex flex-col lg:flex-row gap-8">
    <!-- Message Content -->
    <div class="flex-1">
        <div class="glass-card p-10 relative overflow-hidden h-full">
            <div class="absolute top-0 right-0 p-8 opacity-5">
                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/></svg>
            </div>
            <div class="relative z-10">
                <div class="flex items-center space-x-6 mb-10">
                    <div class="w-20 h-20 bg-blue-600 rounded-3xl flex items-center justify-center text-white text-3xl font-black shadow-lg shadow-blue-500/20">
                        {{ strtoupper(substr($message->name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-slate-800 tracking-tight">{{ $message->name }}</h2>
                        <a href="mailto:{{ $message->email }}" class="text-blue-600 font-bold hover:underline">{{ $message->email }}</a>
                    </div>
                </div>

                <div class="prose max-w-none text-slate-600 leading-loose text-lg border-t border-slate-100 pt-10">
                    <p class="whitespace-pre-wrap">{{ $message->message }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Details Sidebar -->
    <div class="lg:w-80">
        <div class="glass-card p-8 space-y-8">
            <div>
                <h4 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Metadata</h4>
                <div class="space-y-4">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase">Received Date</p>
                        <p class="text-sm font-bold text-slate-700">{{ $message->created_at->format('M d, Y') }}</p>
                        <p class="text-xs text-slate-400">{{ $message->created_at->format('h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase">Subject</p>
                        <p class="text-sm font-bold text-slate-700 italic opacity-60">"{{ $message->subject ?: 'Inquiry from Portfolio' }}"</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-100">
                <h4 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Actions</h4>
                <div class="space-y-3">
                    <a href="mailto:{{ $message->email }}?subject=RE: {{ $message->subject ?: 'Professional Inquiry' }}" class="btn-gradient w-full py-4 text-center block text-sm">
                        Reply Now
                    </a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Permanently delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-4 border border-red-200 text-red-600 font-black text-sm rounded-xl hover:bg-red-50 active:scale-95 transition-all">
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
