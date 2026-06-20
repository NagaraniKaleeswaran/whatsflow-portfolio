<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string', 'color' => 'nullable|string']);
        Tag::create(['user_id' => Auth::id(), 'name' => $request->name, 'color' => $request->color ?? '#3b82f6']);
        return back()->with('success', 'Tag created.');
    }
}
