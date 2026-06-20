<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MessageTemplate;
use App\Models\AutoReplyRule;

class PortfolioAutoReplySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        $rulesData = [
            [
                'name' => 'Welcome New Lead',
                'keyword' => 'hello, hi, hey, start',
                'match_type' => 'contains',
                'response' => "Hi {{name}}, thanks for contacting WhatsFlow. How can we help you today?",
                'is_active' => true,
            ],
            [
                'name' => 'Business Hours Reply',
                'keyword' => 'outside working hours',
                'match_type' => 'contains',
                'response' => "Thank you for reaching out. Our team is currently offline and will respond during business hours.",
                'is_active' => true,
            ],
            [
                'name' => 'Pricing Inquiry',
                'keyword' => 'price, pricing, cost, plan',
                'match_type' => 'contains',
                'response' => "Our plans start at $29/month. Would you like our pricing brochure?",
                'is_active' => true,
            ],
            [
                'name' => 'Demo Request',
                'keyword' => 'demo, presentation',
                'match_type' => 'contains',
                'response' => "Great! Please share your preferred date and we will schedule a demo.",
                'is_active' => true,
            ],
            [
                'name' => 'Shipping Status',
                'keyword' => 'tracking, shipment, delivery',
                'match_type' => 'contains',
                'response' => "Please share your order number and we will check the shipment status.",
                'is_active' => true,
            ],
            [
                'name' => 'Billing Support',
                'keyword' => 'invoice, payment, billing',
                'match_type' => 'contains',
                'response' => "Our billing team will assist you shortly.",
                'is_active' => true,
            ],
            [
                'name' => 'Subscription Upgrade',
                'keyword' => 'upgrade, premium',
                'match_type' => 'contains',
                'response' => "We offer Professional and Enterprise plans. Would you like a comparison?",
                'is_active' => true,
            ],
            [
                'name' => 'Technical Support',
                'keyword' => 'error, issue, bug',
                'match_type' => 'contains',
                'response' => "Sorry for the inconvenience. Please describe the issue and our support team will help.",
                'is_active' => true,
            ],
            [
                'name' => 'WhatsApp API Access',
                'keyword' => 'api, integration',
                'match_type' => 'contains',
                'response' => "Our API documentation is available in the Developer section.",
                'is_active' => true,
            ],
            [
                'name' => 'Lead Qualification',
                'keyword' => 'interested, purchase',
                'match_type' => 'contains',
                'response' => "Thank you for your interest. One of our sales specialists will contact you shortly.",
                'is_active' => false,
            ]
        ];

        foreach ($rulesData as $data) {
            $template = MessageTemplate::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'content' => $data['response'],
            ]);

            AutoReplyRule::create([
                'user_id' => $user->id,
                'keyword' => $data['keyword'],
                'match_type' => $data['match_type'],
                'message_template_id' => $template->id,
                'is_active' => $data['is_active'],
            ]);
        }
    }
}
