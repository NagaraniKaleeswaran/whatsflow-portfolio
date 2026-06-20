<x-app-layout>
    <x-slot name="header">
        Inbox
    </x-slot>

    @if(session('portfolio_mode') || request('portfolio') == 1)
        <div class="w-full">
            <img src="{{ asset('images/portfolio/inbox.png') }}" alt="Inbox Portfolio" class="w-full h-auto block">
        </div>
    @else
        <div class="flex flex-col md:flex-row bg-white overflow-hidden" style="height: calc(100vh - 62px);">
            
            <!-- Sidebar: Conversation List -->
            <div class="w-full md:w-1/3 h-[40%] md:h-full border-b md:border-b-0 md:border-r border-gray-100 flex flex-col bg-gray-50/30 shrink-0">
                <div class="p-4 border-b border-gray-100 bg-white">
                    <input type="text" placeholder="Search conversations..." class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
                
                <div id="conversation-list-container" class="flex-1 overflow-y-auto portfolio-scrollbar-hide">
                    @forelse($conversations as $conv)
                        <a href="{{ route('inbox.show', $conv) }}" class="block border-b border-gray-50 p-4 hover:bg-indigo-50 transition {{ isset($conversation) && $conversation->id == $conv->id ? 'bg-indigo-50/80 border-l-4 border-l-indigo-500' : 'border-l-4 border-l-transparent bg-white' }}">
                            <div class="flex justify-between items-start mb-0.5">
                                @php
                                    $listNameParts = explode(' - ', $conv->lead ? $conv->lead->name : $conv->phone);
                                    $cName = $listNameParts[0];
                                    $cCompany = isset($listNameParts[1]) ? $listNameParts[1] : 'Customer';
                                @endphp
                                <div class="overflow-hidden pr-2">
                                    <h3 class="text-sm font-semibold text-gray-900 truncate">{{ $cName }}</h3>
                                    <p class="text-[11px] text-gray-500 font-medium truncate">Customer &bull; {{ $cCompany }}</p>
                                </div>
                                @if($conv->last_message_at)
                                    <span class="text-[10px] text-gray-400 font-medium mt-0.5 whitespace-nowrap">{{ $conv->last_message_at->shortAbsoluteDiffForHumans() }}</span>
                                @endif
                            </div>
                            <div class="flex justify-between items-center mt-1">
                                <p class="text-[13px] text-gray-500 truncate w-[85%]">
                                    {{ $conv->messages->first() ? $conv->messages->first()->content : 'No messages yet' }}
                                </p>
                                @if($conv->unread_count > 0)
                                    <span class="bg-blue-600 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full shrink-0">{{ $conv->unread_count }}</span>
                                @endif
                            </div>
                        </a>
                    @empty
                        <div class="p-12 text-center">
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <p class="text-gray-500 text-sm">No conversations found.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Main Area: Chat Window -->
            <div class="flex-1 flex flex-col bg-white relative h-[60%] md:h-full overflow-hidden">
                @if(isset($conversation))
                    <!-- Chat Header -->
                    <div class="h-20 border-b border-gray-100 flex items-center justify-between px-6 bg-white shrink-0">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-lg shadow-sm border border-indigo-100">
                                {{ substr($conversation->lead ? $conversation->lead->name : 'W', 0, 1) }}
                            </div>
                            <div>
                                @php
                                    $nameParts = explode(' - ', $conversation->lead ? $conversation->lead->name : $conversation->phone);
                                    $contactName = $nameParts[0];
                                    $companyName = isset($nameParts[1]) ? $nameParts[1] : 'Customer';
                                @endphp
                                <h2 class="text-base font-bold text-gray-900 flex items-center gap-2">
                                    {{ $contactName }}
                                </h2>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <p class="text-xs text-gray-500 font-medium flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        {{ $companyName }}
                                    </p>
                                    <span class="text-gray-300">•</span>
                                    <p class="text-xs text-emerald-600 font-medium flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Active on WhatsApp
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg></button>
                            <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg></button>
                            <div class="w-px h-6 bg-gray-200 mx-2"></div>
                            <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>
                        </div>
                    </div>

                    <!-- Chat Messages -->
                    <div id="chat-messages-container" class="flex-1 overflow-y-auto p-6 space-y-3 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-slate-50/60 portfolio-scrollbar-hide">
                        @forelse($messages as $msg)
                            @if($msg->direction == 'outbound')
                                <div class="flex justify-end group">
                                    <div class="bg-indigo-600 text-white rounded-2xl rounded-tr-sm px-4 py-2.5 max-w-[75%] shadow-sm">
                                        <p class="text-[14px] leading-relaxed">{{ $msg->content }}</p>
                                        <div class="text-[10px] text-indigo-200 mt-1 flex justify-end items-center gap-1 font-medium">
                                            {{ $msg->created_at->format('g:i A') }}
                                            <span class="font-bold tracking-tighter text-blue-200">{{ $msg->status === 'read' ? '✓✓' : ($msg->status === 'delivered' ? '✓✓' : '✓') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex justify-start group">
                                    <div class="bg-white border border-gray-100 text-gray-800 rounded-2xl rounded-tl-sm px-4 py-2.5 max-w-[75%] shadow-sm">
                                        <p class="text-[14px] leading-relaxed">{{ $msg->content }}</p>
                                        <div class="text-[10px] text-gray-400 mt-1 flex justify-start font-medium">
                                            {{ $msg->created_at->format('g:i A') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="h-full flex items-center justify-center text-gray-400 text-sm">
                                Send a message to start the conversation.
                            </div>
                        @endforelse
                    </div>

                    <!-- Chat Input -->
                    <div class="p-4 bg-white border-t border-gray-100 shrink-0">
                        <form action="{{ route('inbox.message', $conversation) }}" method="POST" class="flex gap-3">
                            @csrf
                            <input type="text" name="content" placeholder="Type a message..." class="flex-1 rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm" autocomplete="off" required>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl px-6 py-2 shadow-sm font-medium transition flex items-center gap-2">
                                <span>Send</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex-1 flex flex-col items-center justify-center text-gray-400 bg-gray-50/50">
                        <div class="w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-200 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <p class="text-lg font-medium text-gray-600">No conversation selected</p>
                        <p class="text-sm mt-1">Select a conversation from the sidebar to start messaging.</p>
                    </div>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var chatContainer = document.getElementById('chat-messages-container');
                if (chatContainer) {
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            });
        </script>
    @endif
</x-app-layout>
