<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $query = Faq::where('user_id', Auth::id());
        if (session('portfolio_mode') || request('portfolio') == 1) {
            $query->take(8);
        }
        $faqs = $query->get();
        return view('faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create([
            'user_id' => Auth::id(),
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->back()->with('success', 'FAQ added successfully.');
    }
}
