<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\MessageTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function index()
    {
        $limit = (session('portfolio_mode') || request('portfolio') == 1) ? 8 : 10;
        $campaigns = Campaign::where('user_id', Auth::id())->with('template')->latest()->paginate($limit);
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $templates = MessageTemplate::where('user_id', Auth::id())->get();
        return view('campaigns.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'message_template_id' => 'required|exists:message_templates,id',
            'scheduled_at' => 'nullable|date',
        ]);

        Campaign::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'message_template_id' => $request->message_template_id,
            'status' => $request->scheduled_at ? 'scheduled' : 'draft',
            'scheduled_at' => $request->scheduled_at,
        ]);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created.');
    }

    public function show(Campaign $campaign)
    {
        if ($campaign->user_id !== Auth::id()) abort(403);
        $campaign->load('recipients.lead');
        return view('campaigns.show', compact('campaign'));
    }
}
