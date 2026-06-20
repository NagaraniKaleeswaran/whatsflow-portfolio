<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;
use App\Models\MessageTemplate;
use App\Models\User;
use App\Models\Lead;
use App\Models\CampaignRecipient;
use Carbon\Carbon;

class PortfolioCampaignSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        // Need at least one template to link to campaigns
        $template = MessageTemplate::where('user_id', $user->id)->first();
        if (!$template) return;

        $campaigns = [
            ['name' => 'Black Friday Promotion 2026', 'status' => 'completed', 'scheduled_at' => Carbon::now()->subDays(15)],
            ['name' => 'VIP Customer Reactivation', 'status' => 'running', 'scheduled_at' => Carbon::now()->subHours(2)],
            ['name' => 'Abandoned Cart Recovery Flow', 'status' => 'running', 'scheduled_at' => Carbon::now()->subDays(1)],
            ['name' => 'Q3 New Product Launch', 'status' => 'completed', 'scheduled_at' => Carbon::now()->subDays(45)],
            ['name' => 'Customer Feedback Drive', 'status' => 'completed', 'scheduled_at' => Carbon::now()->subDays(5)],
            ['name' => 'Upcoming Feature Teaser', 'status' => 'scheduled', 'scheduled_at' => Carbon::now()->addDays(5)],
            ['name' => 'Enterprise SLA Update Notice', 'status' => 'completed', 'scheduled_at' => Carbon::now()->subDays(20)],
            ['name' => 'End of Year Clearance Sale', 'status' => 'draft', 'scheduled_at' => null],
        ];

        $leads = Lead::where('user_id', $user->id)->get();

        foreach ($campaigns as $data) {
            $campaign = Campaign::create(array_merge($data, [
                'user_id' => $user->id,
                'message_template_id' => $template->id,
            ]));

            if ($leads->count() > 0 && $campaign->status !== 'draft') {
                foreach ($leads->random(min(3, $leads->count())) as $lead) {
                    CampaignRecipient::create([
                        'campaign_id' => $campaign->id,
                        'lead_id' => $lead->id,
                        'status' => $campaign->status === 'completed' ? 'sent' : 'pending',
                    ]);
                }
            }
        }
    }
}
