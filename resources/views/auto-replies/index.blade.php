<x-app-layout>
    <x-slot name="header">Auto Replies</x-slot>

    @if (session('success'))
        <div class="mb-4 bg-green-50 text-green-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Rules List -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800">Active Rules</h3>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($rules as $rule)
                        @if((session('portfolio_mode') || request('portfolio') == 1) && $loop->iteration > 6)
                            @continue
                        @endif
                        <div class="p-6 hover:bg-gray-50 transition flex justify-between items-start">
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide {{ $rule->match_type == 'exact' ? 'bg-indigo-100 text-indigo-700' : 'bg-purple-100 text-purple-700' }}">
                                        {{ $rule->match_type == 'exact' ? 'Exact Match' : 'Contains Keywords' }}
                                    </span>
                                    <span class="font-mono text-[13px] bg-slate-100 px-2.5 py-0.5 rounded-md text-slate-800 font-medium">"{{ $rule->keyword }}"</span>
                                    @if($rule->is_active)
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide bg-emerald-100 text-emerald-700">Active</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide bg-amber-100 text-amber-700">Paused</span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-800 mt-2 font-medium">Replies with: <span class="text-indigo-600">{{ $rule->template->name ?? 'Unknown Template' }}</span></p>
                                <div class="mt-2 pl-3 border-l-2 border-indigo-200">
                                    <p class="text-[13px] text-gray-500 italic line-clamp-1">"{{ $rule->template->content ?? '' }}"</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" {{ $rule->is_active ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="p-16 text-center">
                            <div class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1">No rules configured</h3>
                            <p class="text-gray-500">Add a keyword rule to automate your replies.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Create Rule Form -->
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="p-6 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">New Rule</h3>
                </div>
                <form action="{{ route('auto-replies.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keyword / Phrase</label>
                        <input type="text" name="keyword" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500" required placeholder="e.g. price, hello">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Match Type</label>
                        <select name="match_type" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500">
                            <option value="exact">Exact Match</option>
                            <option value="contains">Contains Word</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Reply Template</label>
                        <select name="message_template_id" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500" required>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm transition font-medium">
                        Add Rule
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
