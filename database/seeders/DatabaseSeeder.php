<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Lead;
use App\Models\MessageTemplate;
use App\Models\AutoReplyRule;
use App\Models\Faq;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Campaign;
use App\Models\CampaignRecipient;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'demo@whatsflow.com'],
            ['name' => 'Demo User', 'password' => Hash::make('password')]
        );

        $this->call([
            PortfolioTemplateSeeder::class,
            PortfolioFaqSeeder::class,
            PortfolioLeadSeeder::class,
            PortfolioCampaignSeeder::class,
            PortfolioConversationSeeder::class,
            PortfolioAutoReplySeeder::class,
        ]);
        
        // Seed some extra realistic data so the dashboard KPI numbers look good
        $firstNames = ['John', 'Jane', 'Alex', 'Emily', 'Chris', 'Katie', 'Mike', 'Sarah', 'Tom', 'Jessica', 'Ryan', 'Amanda', 'Matt', 'Ashley', 'David', 'Megan', 'Andrew', 'Lauren', 'James', 'Rachel'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris', 'Martin', 'Thompson', 'Garcia', 'Martinez', 'Robinson'];
        $companies = ['TechCorp', 'Global Solutions', 'Innovate LLC', 'CloudSync', 'DataDrive', 'Apex Retail', 'NextGen Logistics', 'BrightFuture', 'Pioneer SaaS', 'Elevate Media'];
        
        $leads = Lead::where('user_id', $user->id)->get()->all();
        $templates = MessageTemplate::where('user_id', $user->id)->get()->all();
        
        $statuses = ['new', 'contacted', 'qualified', 'converted', 'lost'];
        $notes = ['Requested a callback.', 'Interested in bulk pricing.', 'Awaiting API documentation.', 'Needs help with integration.', 'Follow up next week.', 'Current customer looking to upgrade.', 'Attended the webinar.'];
        
        for ($i = 0; $i < 30; $i++) {
            $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
            if (rand(0, 1) === 1) {
                $name .= ' - ' . $companies[array_rand($companies)];
            }
            $leads[] = Lead::create([
                'user_id' => $user->id,
                'name' => $name,
                'phone' => '+1555' . str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT),
                'status' => $statuses[array_rand($statuses)],
                'notes' => $notes[array_rand($notes)],
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);
        }

        $campaignNames = ['Spring Renewal Promo', 'Churn Prevention Series', 'Webinar Follow-up', 'Product Update: Version 2.0', 'Flash Sale - 24 Hours', 'Welcome Series Drip', 'Re-engagement Blast'];
        for ($i = 0; $i < 10; $i++) {
            $status = ['scheduled', 'running', 'completed', 'draft'][rand(0, 3)];
            $campaign = Campaign::create([
                'user_id' => $user->id,
                'name' => $campaignNames[array_rand($campaignNames)],
                'message_template_id' => $templates[array_rand($templates)]->id,
                'status' => $status,
                'scheduled_at' => Carbon::now()->addDays(rand(-10, 10)),
            ]);

            $campaignLeads = array_rand($leads, 5);
            foreach ((array)$campaignLeads as $leadIdx) {
                CampaignRecipient::create([
                    'campaign_id' => $campaign->id,
                    'lead_id' => $leads[$leadIdx]->id,
                    'status' => $status === 'completed' ? 'sent' : 'pending',
                ]);
            }
        }
        
        $inboundMessages = ['How much does it cost?', 'Can I upgrade my plan?', 'Thanks for the info.', 'I need help with billing.', 'Is this available in Europe?', 'Please call me tomorrow.', 'How do I reset my password?', 'Do you have a mobile app?'];
        
        for ($i = 0; $i < 15; $i++) {
            $lead = $leads[array_rand($leads)];
            $conversation = Conversation::create([
                'user_id' => $user->id,
                'lead_id' => $lead->id,
                'phone' => $lead->phone,
                'unread_count' => rand(0, 1),
                'last_message_at' => Carbon::now()->subHours(rand(1, 72)),
            ]);
            
            Message::create([
                'conversation_id' => $conversation->id,
                'direction' => 'inbound',
                'content' => $inboundMessages[array_rand($inboundMessages)],
                'type' => 'text',
                'status' => 'read',
                'created_at' => Carbon::parse($conversation->last_message_at),
            ]);
        }
    }
}
