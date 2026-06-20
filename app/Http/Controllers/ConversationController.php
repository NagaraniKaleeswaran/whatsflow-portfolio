<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index()
    {
        $query = Conversation::where('user_id', Auth::id())
            ->with(['lead', 'messages' => function($q) { $q->latest()->limit(1); }])
            ->orderBy('last_message_at', 'desc');
            
        $conversations = $query->get();
            
        if ((session('portfolio_mode') || request('portfolio') == 1) && $conversations->isNotEmpty()) {
            $bestConversation = $conversations->sortByDesc(function ($c) {
                return $c->messages()->count();
            })->first();
            
            if ($bestConversation) {
                return redirect()->route('inbox.show', $bestConversation);
            }
        }
            
        return view('inbox.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        if ($conversation->user_id !== Auth::id()) abort(403);
        
        $conversation->update(['unread_count' => 0]);
        
        $query = Conversation::where('user_id', Auth::id())
            ->with(['lead', 'messages' => function($q) { $q->latest()->limit(1); }])
            ->orderBy('last_message_at', 'desc');
            
        $conversations = $query->get();
            
        $messages = $conversation->messages()->orderBy('created_at', 'asc')->get();
        
        return view('inbox.index', compact('conversations', 'conversation', 'messages'));
    }

    public function sendMessage(Request $request, Conversation $conversation)
    {
        if ($conversation->user_id !== Auth::id()) abort(403);
        
        $request->validate([
            'content' => 'required|string'
        ]);

        $message = $conversation->messages()->create([
            'direction' => 'outbound',
            'content' => $request->content,
            'type' => 'text',
            'status' => 'sent'
        ]);

        $conversation->update(['last_message_at' => now()]);

        return redirect()->route('inbox.show', $conversation);
    }
}
