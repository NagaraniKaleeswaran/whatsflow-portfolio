<x-app-layout>
    <x-slot name="header">
        WhatsApp Configuration
    </x-slot>

    <div class="max-w-4xl mx-auto">
        @if (session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative flex items-center" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                <h2 class="text-lg font-semibold text-gray-800">API Credentials</h2>
                <p class="text-sm text-gray-500 mt-1">Configure your WhatsApp Cloud API credentials to start sending and receiving messages.</p>
            </div>
            
            <form action="{{ route('whatsapp.config.store') }}" method="POST" class="p-6 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number ID</label>
                        <input type="text" name="phone_number_id" value="{{ old('phone_number_id', $config->phone_number_id) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Business Account ID</label>
                        <input type="text" name="whatsapp_business_account_id" value="{{ old('whatsapp_business_account_id', $config->whatsapp_business_account_id) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Permanent Access Token</label>
                    <textarea name="access_token" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150" required>{{ old('access_token', $config->access_token) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Webhook Verify Token</label>
                    <input type="text" name="verify_token" value="{{ old('verify_token', $config->verify_token) }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150" required>
                    <p class="text-xs text-gray-500 mt-2">Create a strong random string and use it when setting up the webhook in Meta App Dashboard.</p>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        Save Configuration
                    </button>
                </div>
            </form>
        </div>
        
        @if($config->is_active)
        <div class="mt-8 bg-indigo-50 rounded-2xl border border-indigo-100 p-6">
            <h3 class="text-indigo-800 font-semibold mb-2">Webhook URL</h3>
            <p class="text-sm text-indigo-600 mb-3">Copy this URL and add it to your Meta App Dashboard Webhook configuration:</p>
            <div class="flex items-center gap-3">
                <code class="bg-white px-4 py-2 rounded-lg border border-indigo-200 text-indigo-900 font-mono text-sm flex-1">{{ url('/api/webhook/whatsapp') }}</code>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
