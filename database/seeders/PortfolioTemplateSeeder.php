<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MessageTemplate;
use App\Models\User;

class PortfolioTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        $templates = [
            ['name' => 'Welcome Message', 'content' => "Hi [name], welcome to WhatsFlow! We're thrilled to have you on board. Let us know if you need help getting started.", 'variables' => ['name']],
            ['name' => 'Order Confirmation', 'content' => "Hello [name], your order #[order_id] has been successfully processed. Thank you for your business!", 'variables' => ['name', 'order_id']],
            ['name' => 'Shipping Update', 'content' => "Great news! Your package is on the way. You can track it here: [tracking_link]", 'variables' => ['tracking_link']],
            ['name' => 'Payment Reminder', 'content' => "Hi [name], this is a gentle reminder that your invoice for [amount] is due on [date].", 'variables' => ['name', 'amount', 'date']],
            ['name' => 'Subscription Renewal', 'content' => "Your Enterprise SaaS subscription will automatically renew in 3 days. Contact support if you need to make changes.", 'variables' => []],
            ['name' => 'Webinar Invitation', 'content' => "Join our Q3 Masterclass on WhatsApp Automation! Save your spot: [link]", 'variables' => ['link']],
            ['name' => 'Customer Feedback', 'content' => "Hi [name], how was your recent experience with our support team? Reply with a score from 1-10.", 'variables' => ['name']],
            ['name' => 'Abandoned Cart Recovery', 'content' => "Hi [name], you left something behind! Complete your purchase today and get 10% off with code SAVE10.", 'variables' => ['name']],
        ];

        foreach ($templates as $data) {
            MessageTemplate::create(array_merge($data, ['user_id' => $user->id]));
        }
    }
}
