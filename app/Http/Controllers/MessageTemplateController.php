<?php

namespace App\Http\Controllers;

use App\Models\MessageTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageTemplateController extends Controller
{
    public function index()
    {
        $query = MessageTemplate::where('user_id', Auth::id())->latest();
        if (session('portfolio_mode') || request('portfolio') == 1) {
            $query->take(8);
        }
        $templates = $query->get();
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
        ]);

        // Simple variable extraction like [name]
        preg_match_all('/\[(.*?)\]/', $request->content, $matches);
        $variables = $matches[1] ?? [];

        MessageTemplate::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'content' => $request->content,
            'variables' => $variables,
        ]);

        return redirect()->route('templates.index')->with('success', 'Template created.');
    }
}
