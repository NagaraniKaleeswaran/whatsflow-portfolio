<x-app-layout>
    <x-slot name="header">Create Template</x-slot>

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-indigo-50/50">
            <h3 class="text-indigo-800 font-semibold mb-2">Variables Support</h3>
            <p class="text-sm text-indigo-600">You can use variables in your template by wrapping them in brackets, for example <code class="bg-white px-2 py-1 rounded text-indigo-900 border border-indigo-200">Hello [name]!</code></p>
        </div>

        <form action="{{ route('templates.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Template Name</label>
                <input type="text" name="name" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Template Content</label>
                <textarea name="content" rows="6" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition" required placeholder="Hi [name], thanks for your interest in..."></textarea>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('templates.index') }}" class="py-2.5 px-6 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="py-2.5 px-6 border border-transparent rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    Save Template
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
