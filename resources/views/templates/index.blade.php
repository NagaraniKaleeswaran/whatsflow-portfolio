<x-app-layout>
    <x-slot name="header">Message Templates</x-slot>

    @if(session('portfolio_mode') || request('portfolio') == 1)
        <div class="w-full">
            <img src="{{ asset('images/portfolio/templates.png') }}" alt="Templates Portfolio" class="w-full h-auto block">
        </div>
    @else
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl text-gray-800 font-semibold">WhatsApp Templates</h2>
        <a href="{{ route('templates.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition">
            Create Template
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 bg-green-50 text-green-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($templates as $template)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="p-5 flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $template->name }}</h3>
                    <p class="text-gray-600 text-sm whitespace-pre-line">{{ $template->content }}</p>
                </div>
                <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-between items-center text-xs">
                    <span class="text-gray-500">
                        {{ is_array($template->variables) ? count($template->variables) : 0 }} variables
                    </span>
                    <span class="text-indigo-600 font-medium">Meta Approved</span>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white px-6 py-16 rounded-2xl text-center shadow-sm border border-gray-100">
                <div class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">No templates found</h3>
                <p class="text-gray-500 mb-6">Create pre-approved WhatsApp templates to use in your campaigns.</p>
                <a href="{{ route('templates.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Create Template
                </a>
            </div>
        @endforelse
    </div>
    @endif
</x-app-layout>
