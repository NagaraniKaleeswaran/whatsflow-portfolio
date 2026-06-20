<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Conversation;
use App\Models\Campaign;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Top Metrics
        $totalLeads = Lead::where('user_id', $userId)->count();
        $totalConversations = Conversation::where('user_id', $userId)->count();
        $totalCampaigns = Campaign::where('user_id', $userId)->count();
        $totalMessages = Message::whereHas('conversation', function($q) use ($userId) {
            $q->where('user_id', $userId);
        })->count();

        // 1. Lead Growth (last 30 days)
        $leadGrowth = Lead::where('user_id', $userId)
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
        
        $leadGrowthLabels = $leadGrowth->pluck('date')->map(function($date) {
            return Carbon::parse($date)->format('M d');
        });
        $leadGrowthData = $leadGrowth->pluck('count');

        // 2. Campaign Performance
        $campaignPerformance = Campaign::where('user_id', $userId)
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();
        $campaignLabels = $campaignPerformance->pluck('status')->map(fn($s) => ucfirst($s));
        $campaignData = $campaignPerformance->pluck('count');

        // 3. Lead Status Distribution
        $leadStatus = Lead::where('user_id', $userId)
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();
        $leadStatusLabels = $leadStatus->pluck('status')->map(fn($s) => ucfirst($s));
        $leadStatusData = $leadStatus->pluck('count');

        // 4. Message Volume (last 30 days)
        $messageVolume = Message::whereHas('conversation', function($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->where('messages.created_at', '>=', Carbon::now()->subDays(30))
            ->select(DB::raw('DATE(messages.created_at) as date'), 'direction', DB::raw('COUNT(*) as count'))
            ->groupBy('date', 'direction')
            ->orderBy('date', 'asc')
            ->get();

        $dates = $messageVolume->pluck('date')->unique()->sort()->values();
        $messageLabels = $dates->map(function($date) { return Carbon::parse($date)->format('M d'); });
        
        $inboundData = [];
        $outboundData = [];
        foreach ($dates as $date) {
            $inboundData[] = $messageVolume->where('date', $date)->where('direction', 'inbound')->first()->count ?? 0;
            $outboundData[] = $messageVolume->where('date', $date)->where('direction', 'outbound')->first()->count ?? 0;
        }

        $limit = (session('portfolio_mode') || request('portfolio') == 1) ? 3 : 5;
        $recentLeads = Lead::where('user_id', $userId)->orderBy('created_at', 'desc')->take($limit)->get();
        $recentConversations = Conversation::where('user_id', $userId)->with('lead')->orderBy('last_message_at', 'desc')->take($limit)->get();
        $recentCampaigns = Campaign::where('user_id', $userId)->orderBy('created_at', 'desc')->take($limit)->get();

        return view('dashboard', compact(
            'totalLeads', 'totalConversations', 'totalCampaigns', 'totalMessages',
            'leadGrowthLabels', 'leadGrowthData',
            'campaignLabels', 'campaignData',
            'leadStatusLabels', 'leadStatusData',
            'messageLabels', 'inboundData', 'outboundData',
            'recentLeads', 'recentConversations', 'recentCampaigns'
        ));
    }
}
