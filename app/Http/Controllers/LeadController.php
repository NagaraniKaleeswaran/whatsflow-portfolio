<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::where('user_id', Auth::id());
        
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }
        
        $limit = (session('portfolio_mode') || request('portfolio') == 1) ? 8 : 10;
        $leads = $query->latest()->paginate($limit);
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        Lead::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    public function edit(Lead $lead)
    {
        if ($lead->user_id !== Auth::id()) abort(403);
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        if ($lead->user_id !== Auth::id()) abort(403);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $lead->update($request->only('name', 'phone', 'status', 'notes'));
        return redirect()->route('leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        if ($lead->user_id !== Auth::id()) abort(403);
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }
}
