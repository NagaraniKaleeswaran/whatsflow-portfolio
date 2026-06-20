<?php

namespace App\Http\Controllers;

use App\Models\WhatsappConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhatsappConfigController extends Controller
{
    public function index()
    {
        $config = WhatsappConfig::firstOrCreate(
            ['user_id' => Auth::id()],
            ['is_active' => false]
        );
        
        return view('whatsapp.config', compact('config'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number_id' => 'required|string',
            'whatsapp_business_account_id' => 'required|string',
            'access_token' => 'required|string',
            'verify_token' => 'required|string',
        ]);

        $config = WhatsappConfig::firstOrCreate(['user_id' => Auth::id()]);
        
        $config->update([
            'phone_number_id' => $request->phone_number_id,
            'whatsapp_business_account_id' => $request->whatsapp_business_account_id,
            'access_token' => $request->access_token,
            'verify_token' => $request->verify_token,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'WhatsApp configuration saved successfully.');
    }
}
