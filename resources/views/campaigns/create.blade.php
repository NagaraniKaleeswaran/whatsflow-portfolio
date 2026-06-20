<x-app-layout>
    <x-slot name="header">Create Campaign</x-slot>

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('campaigns.store') }}" method="POST" class="p-6 md:p-8 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Campaign Name</label>
                <input type="text" name="name" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Message Template</label>
                <select name="message_template_id" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition" required>
                    <option value="">Select a template...</option>
                    @foreach($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-2">To send a campaign, you must have an approved Meta WhatsApp template.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Schedule (Optional)</label>
                <input type="datetime-local" name="scheduled_at" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                <p class="text-xs text-gray-500 mt-2">Leave blank to send immediately after activation.</p>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                <a href="{{ route('campaigns.index') }}" class="py-2.5 px-6 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="py-2.5 px-6 border border-transparent rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    Create Campaign
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
