<x-app-layout>
    <x-slot name="header">Knowledge Base (FAQs)</x-slot>

    @if(session('portfolio_mode') || request('portfolio') == 1)
        <div class="w-full">
            <img src="{{ asset('images/portfolio/knowledge.png') }}" alt="Knowledge Base Portfolio" class="w-full h-auto block">
        </div>
    @else
    @if (session('success'))
        <div class="mb-4 bg-green-50 text-green-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- FAQ List -->
        <div class="lg:col-span-2 space-y-4">
            @forelse($faqs as $faq)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-900 mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $faq->question }}
                    </h3>
                    <div class="pl-7 text-gray-600 text-sm whitespace-pre-line">
                        {{ $faq->answer }}
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">No FAQs added yet</h3>
                    <p class="text-gray-500">Add knowledge base entries so your AI Assistant can answer customer queries automatically.</p>
                </div>
            @endforelse
        </div>

        <!-- Add FAQ Form -->
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="p-6 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Add Entry</h3>
                </div>
                <form action="{{ route('faqs.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Question</label>
                        <input type="text" name="question" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500" required placeholder="e.g. What are your working hours?">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Answer</label>
                        <textarea name="answer" rows="4" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500" required placeholder="We are open Monday to Friday..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm transition font-medium">
                        Save to Knowledge Base
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
