<?php

namespace App\Http\Controllers;

use App\Models\AutoReplyRule;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoReplyRuleController extends Controller
{
    public function index()
    {
        $rules = AutoReplyRule::where('user_id', Auth::id())->with('template')->get();
        $templates = MessageTemplate::where('user_id', Auth::id())->get();
        return view('auto-replies.index', compact('rules', 'templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
            'match_type' => 'required|in:exact,contains',
            'message_template_id' => 'required|exists:message_templates,id',
        ]);

        AutoReplyRule::create([
            'user_id' => Auth::id(),
            'keyword' => strtolower($request->keyword),
            'match_type' => $request->match_type,
            'message_template_id' => $request->message_template_id,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Auto-reply rule created.');
    }
}
