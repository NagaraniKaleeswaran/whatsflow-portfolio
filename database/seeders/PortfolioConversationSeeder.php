<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Models\Lead;
use Carbon\Carbon;

class PortfolioConversationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        $leads = Lead::where('user_id', $user->id)->get();
        if ($leads->isEmpty()) return;

        $conversationsData = [
            [
                'lead_idx' => 0,
                'unread' => 0,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Hi there! I am looking into your Premium plan. Can you clarify if it includes the API access?'],
                    ['direction' => 'outbound', 'content' => 'Hello Sarah! Yes, the Premium plan includes full REST API access, webhooks, and up to 50,000 requests per month. Would you like me to send you the documentation?'],
                    ['direction' => 'inbound', 'content' => 'That would be great, thanks.'],
                    ['direction' => 'outbound', 'content' => 'Here is the link to our developer hub: docs.whatsflow.com/api'],
                    ['direction' => 'inbound', 'content' => 'Perfect. One more question: do you offer any discounts for annual billing?'],
                    ['direction' => 'outbound', 'content' => 'Absolutely! We offer a 20% discount if you switch to annual billing, which brings the cost down to $79/month.'],
                    ['direction' => 'inbound', 'content' => 'That sounds reasonable. If I upgrade today, how long does it take for the API keys to be activated?'],
                    ['direction' => 'outbound', 'content' => 'API keys are generated instantly upon upgrade. You can find them right in your dashboard under Settings > Developer.'],
                    ['direction' => 'inbound', 'content' => 'Great! Just processed the payment.'],
                    ['direction' => 'outbound', 'content' => 'Payment received! Welcome to WhatsFlow Premium, Sarah. Let me know if you need help setting up your first automation campaign.'],
                ]
            ],
            [
                'lead_idx' => 1,
                'unread' => 2,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Hey, I ordered the logistics tracker add-on but my dashboard has not updated yet. Order #99281'],
                    ['direction' => 'outbound', 'content' => 'Hi Michael, let me check that for you right away.'],
                    ['direction' => 'outbound', 'content' => 'I see the transaction. There was a slight delay in our provisioning server. I just synced it manually. Can you refresh your page?'],
                    ['direction' => 'inbound', 'content' => 'Got it! Working perfectly now. Thanks for the quick support.'],
                    ['direction' => 'outbound', 'content' => 'Glad it is resolved! Let me know if anything else comes up.'],
                ]
            ],
            [
                'lead_idx' => 2,
                'unread' => 0,
                'messages' => [
                    ['direction' => 'outbound', 'content' => 'Hi David, just following up on our demo yesterday. Do you have any questions about the multi-agent inbox?'],
                    ['direction' => 'inbound', 'content' => 'Yes, actually. Can we assign specific agents to specific geographic regions?'],
                    ['direction' => 'outbound', 'content' => 'Yes! You can set up routing rules based on the customer country code.'],
                ]
            ],
            [
                'lead_idx' => 3,
                'unread' => 0,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Does that apply to upgrades as well?'],
                    ['direction' => 'outbound', 'content' => 'Yes, Emma! You can upgrade your current plan using the same code.'],
                ]
            ],
            [
                'lead_idx' => 4,
                'unread' => 1,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'I need help with billing. Can someone call me?'],
                    ['direction' => 'outbound', 'content' => 'Hi Lisa, our billing team can call you at 3 PM EST. Does that work?'],
                    ['direction' => 'inbound', 'content' => 'Yes, please call me then.'],
                ]
            ],
            [
                'lead_idx' => 5,
                'unread' => 5,
                'messages' => [
                    ['direction' => 'outbound', 'content' => 'Hi Ashley, your API limit has been increased to 100k.'],
                    ['direction' => 'inbound', 'content' => 'Thanks! Is WhatsFlow available in Europe?'],
                ]
            ],
            [
                'lead_idx' => 6,
                'unread' => 2,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Do you support Shopify integration?'],
                    ['direction' => 'outbound', 'content' => 'Yes, Lauren! We have a native Shopify app available.'],
                    ['direction' => 'inbound', 'content' => 'Great. How much does it cost?'],
                ]
            ],
            [
                'lead_idx' => 7,
                'unread' => 0,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Payment received. Thank you!'],
                    ['direction' => 'outbound', 'content' => 'You are welcome, James. Enjoy your Premium features.'],
                ]
            ],
            [
                'lead_idx' => 8,
                'unread' => 8,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Can I upgrade my subscription?'],
                ]
            ],
            [
                'lead_idx' => 9,
                'unread' => 0,
                'messages' => [
                    ['direction' => 'inbound', 'content' => 'Campaign delivery rate seems low.'],
                    ['direction' => 'outbound', 'content' => 'Hi Daniel, let me investigate that for you.'],
                ]
            ],
        ];

        foreach ($conversationsData as $data) {
            if (!isset($leads[$data['lead_idx']])) continue;
            
            $lead = $leads[$data['lead_idx']];
            
            $conversation = Conversation::create([
                'user_id' => $user->id,
                'lead_id' => $lead->id,
                'phone' => $lead->phone,
                'unread_count' => $data['unread'],
                'last_message_at' => Carbon::now()->subMinutes(rand(1, 120)),
            ]);

            foreach ($data['messages'] as $idx => $msg) {
                Message::create([
                    'conversation_id' => $conversation->id,
                    'direction' => $msg['direction'],
                    'content' => $msg['content'],
                    'type' => 'text',
                    'status' => $msg['direction'] === 'outbound' ? 'read' : 'read',
                    'created_at' => Carbon::parse($conversation->last_message_at)->subMinutes(50 - ($idx * 10)),
                ]);
            }
        }
    }
}
