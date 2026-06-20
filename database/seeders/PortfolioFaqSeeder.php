<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\User;

class PortfolioFaqSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        $faqs = [
            [
                'question' => 'How do I upgrade my billing plan?',
                'answer' => 'You can upgrade your plan at any time by navigating to Settings > Billing. Select the Enterprise tier and your prorated charge will be processed immediately.',
            ],
            [
                'question' => 'How to integrate with Shopify?',
                'answer' => 'To connect your Shopify store, go to the Integrations tab, click "Connect Shopify", and enter your store URL. Our system will automatically sync your abandoned cart events.',
            ],
            [
                'question' => 'What is the WhatsApp API rate limit?',
                'answer' => 'Meta imposes a limit of 1,000 tier-1 conversations per 24 hours. If you need a higher limit, you must verify your business in the Facebook Business Manager.',
            ],
            [
                'question' => 'How do I manage User Permissions?',
                'answer' => 'Admins can invite team members and assign roles (Agent, Manager, Admin) under Settings > Team. Agents can only view their assigned leads and conversations.',
            ],
            [
                'question' => 'Can I schedule Campaign messages?',
                'answer' => 'Yes! When creating a Campaign, simply select "Schedule for later" and pick your desired timezone and dispatch time. The system will handle the rest.',
            ],
            [
                'question' => 'How do Auto-Replies work?',
                'answer' => 'Auto-Replies trigger when an inbound message matches your specified keywords. You can configure exact match or partial match rules under the Automation tab.',
            ],
            [
                'question' => 'Are templates automatically approved?',
                'answer' => 'No. All WhatsApp Message Templates must be submitted to Meta for review. This typically takes between 2 to 24 hours. You cannot send a campaign until the template status is "Approved".',
            ],
            [
                'question' => 'How do I export my Leads?',
                'answer' => 'Navigate to the Leads page and click the "Export CSV" button in the top right. This will generate a downloadable file containing all your contacts and their custom fields.',
            ],
        ];

        foreach ($faqs as $data) {
            Faq::create(array_merge($data, [
                'user_id' => $user->id,
                'is_active' => true,
            ]));
        }
    }
}
