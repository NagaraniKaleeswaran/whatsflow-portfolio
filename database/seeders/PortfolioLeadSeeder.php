<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\User;
use Carbon\Carbon;

class PortfolioLeadSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@whatsflow.com')->first();
        if (!$user) return;

        $leads = [
            ['name' => 'Sarah Johnson - BrightCommerce', 'phone' => '+15551234567', 'status' => 'new', 'notes' => 'Interested in the new enterprise plan.'],
            ['name' => 'Michael Chen - Nova Retail', 'phone' => '+15552345678', 'status' => 'contacted', 'notes' => 'Requested a product demo.'],
            ['name' => 'David Wilson - Peak Solutions', 'phone' => '+15553456789', 'status' => 'qualified', 'notes' => 'Awaiting API integration details.'],
            ['name' => 'Emma Rodriguez - Acme Logistics', 'phone' => '+15554567890', 'status' => 'converted', 'notes' => 'Successfully onboarded 5 agents.'],
            ['name' => 'Lisa Taylor - Elevate Media', 'phone' => '+15557890123', 'status' => 'contacted', 'notes' => 'Discussed volume discounts.'],
            ['name' => 'Ashley Garcia - Skyline Digital', 'phone' => '+15558901234', 'status' => 'new', 'notes' => 'Checking API limits.'],
            ['name' => 'Lauren Miller - Northwind Group', 'phone' => '+15559012345', 'status' => 'qualified', 'notes' => 'Asked for enterprise SLA.'],
            ['name' => 'James Walker - Vertex Systems', 'phone' => '+15550123456', 'status' => 'converted', 'notes' => 'Setup completed.'],
            ['name' => 'Sophia Brown - RetailPro', 'phone' => '+15551230987', 'status' => 'new', 'notes' => 'Needs an account manager.'],
            ['name' => 'Daniel Lee - Commerce Hub', 'phone' => '+15552340987', 'status' => 'contacted', 'notes' => 'Follow up on Tuesday.'],
            ['name' => 'Olivia Davis - Prime Logistics', 'phone' => '+15553450987', 'status' => 'qualified', 'notes' => 'Evaluating against Twilio.'],
            ['name' => 'Ethan Clark - Bright Commerce', 'phone' => '+15554560987', 'status' => 'converted', 'notes' => 'Upgraded to Premium.'],
        ];

        foreach ($leads as $i => $data) {
            Lead::create(array_merge($data, [
                'user_id' => $user->id,
                'created_at' => Carbon::now()->subDays(rand(1, 10))->subHours(rand(1, 24)),
            ]));
        }
    }
}
